<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
// use App\Models\Client;
use App\Models\Lead;
use App\Events\MessageCreated;
use App\Models\Operator;
use App\Models\Product;
use Pusher\Pusher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class FbPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Lead::select('id', 'client_name', 'client_whatsapp')->toJson(JSON_PRETTY_PRINT);
        return response($clients, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lead(Request $request, $campaign_id, $product_id){
        $admin_id = DB::table('campaigns')->where('id', $campaign_id)->value('admin_id');
        $validateData = Validator::make($request->all(),[
            'name'             => 'required',
            'whatsapp'         => 'required',
        ]);
        if ($validateData->fails()) {
            return response($validateData->errors(), 400);
        }else{
            if(substr(trim($request->whatsapp), 0, 1)=='0'){
                $whatsapp = '62'.substr(trim($request->whatsapp), 1);
            } else{
                $whatsapp = $request->whatsapp;
            }
            // $client_id = DB::table('clients')->insertGetId([
            //     'admin_id' => $admin_id,
            //     'campaign_id' => $campaign_id,
            //     'name' => $request->name,
            //     'whatsapp' => $whatsapp,
            //     'created_at'      => Carbon::now()->toDateTimeString(),
            //     'updated_at'      => Carbon::now()->toDateTimeString()
            // ]);
            // return $client_id;
            // $clients = new Client();
            // $clients->admin_id = $admin_id;
            // $clients->campaign_id = $campaign_id;
            // $clients->name = $request->name;

            // $clients->whatsapp = $whatsapp;
            // $clients->save();

            $adv_id = DB::table('campaigns')->where('id', $campaign_id)->value('user_id');
            $adv_name = DB::table('users')->where('id', $adv_id)->value('name');
            $product_price = DB::table('products')->where('id', $product_id)->value('price');


            // ambil text untuk dikirim ke WA
            $text = Campaign::where('id', $campaign_id)->value('customer_to_cs');
            // ambil nomer WA CS
            $wa = DB::table('operators as o')
                ->leftJoin('users', 'o.user_id', '=', 'users.id')
                // ->leftJoin('closing_rates as cr', 'cr.user_id', '=', 'users.id')
                ->where('campaign_id', $campaign_id)
                ->where('o.deleted_at', null)
                ->select('users.phone')
                // ->orderByDesc('month_closing_rate')
                ->get();
            // menghitung jumlah operator tiap campaign
            $operator_count = DB::table('operators')
                ->leftJoin('users', 'operators.user_id', '=', 'users.id')
                ->where('operators.deleted_at', null)
                ->where('campaign_id', $campaign_id)
                ->count();

            // menghitung jumlah click tombol WA
            $counter = DB::table('distribution_counters')->where('campaign_id', $campaign_id)->value('counter');
            // rotasi nomer WA
            if($counter >= $operator_count-1){
                DB::table('distribution_counters')
                ->where('campaign_id', $campaign_id)
                ->update([
                    'campaign_id' => $campaign_id,
                    'counter' => 0
                ]);
            }else{
                DB::table('distribution_counters')->where('campaign_id', $campaign_id)->increment('counter');
            }
            $user_id = DB::table('users')->where('phone', $wa[$counter]->phone)->where('deleted_at', null)->value('id');
            $operator_id = DB::table('operators')->where('admin_id', $admin_id)->where('user_id', $user_id)->where('campaign_id', $campaign_id)->where('deleted_at', null)->value('id');
            $lead_id = DB::table('leads')->insertGetId([
                'admin_id'   => $admin_id,
                'advertiser' => $adv_name,
                'campaign_id' => $campaign_id,
                'operator_id'   => $operator_id,
                'product_id' => $product_id,
                // 'client_id'    => $client_id,
                'client_name' => $request->name,
                'client_whatsapp' => $whatsapp,
                'user_id'    => $user_id,
                'price'      => $product_price,
                'status_id'  => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('products')->whereid($product_id)->where('deleted_at', null)->increment('lead');
            $day = Carbon::now()->format('Y-m-d');
            $data_lead = DB::table('leads')->Where('admin_id', $admin_id)->where('created_at', $day)->where('deleted_at', null)->count();

            $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER'),
                        'encrypted' => true
                    );
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
                );

            $data['message'] = $data_lead;
            $pusher->trigger('message-channel', 'App\\Events\\MessageCreated', $data);

            $wa_number = $wa[$counter]->phone;
            $thanks = Campaign::where('id', $campaign_id)->where('deleted_at', null)->value('message');
            $client_name = Lead::where('id', $lead_id)->value('client_name');
            $client_number = Lead::where('id', $lead_id)->where('deleted_at', null)->value('client_whatsapp');
            $operator_name = Operator::where('campaign_id', $campaign_id)->where('deleted_at', null)->where('user_id', $user_id)->value('name');
            $product_name = Product::where('id', $product_id)->where('deleted_at', null)->value('name');
            $wa_text = 'Kode Order: ord-'.$lead_id.'%0A'.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($client_name, $client_number, $operator_name, $product_name), $text);

            $cs_email = DB::table('users')->where('phone', $wa[$counter]->phone)->where('deleted_at', null)->value('email');
            $sendMail = new MailController;
            $sendMail->index($cs_email, $wa_number, $campaign_id, $product_id, $lead_id);
            // return Redirect::route('send', [
            //     'email' => $cs_email,
            //     'number' => $wa_number,
            //     'campaign_id' => $campaign_id,
            //     'product_id' => $product_id,
            //     'client_id' => $client_id,
            //     'lead_id' => $lead_id
            // ]);
            return redirect('http://orderku.site/'.$wa_number.'/'.rawurlencode($wa_text).'/'.$thanks);
        }
    }

    public function lead_wa($campaign_id, $product_id){
        $admin_id = DB::table('campaigns')->where('id', $campaign_id)->value('admin_id');
        // $client_id = DB::table('clients')->insertGetId([
        //     'admin_id' => $admin_id,
        //     'campaign_id' => $campaign_id,
        //     'created_at'      => Carbon::now()->toDateTimeString(),
        //     'updated_at'      => Carbon::now()->toDateTimeString()
        // ]);
        // $clients = new Client();
        // $clients->admin_id = $admin_id;
        // $clients->campaign_id = $campaign_id;
        // $clients->save();

        // ambil text untuk dikirim ke WA
        $text = Campaign::where('id', $campaign_id)->where('deleted_at', null)->value('customer_to_cs');
        // ambil nomer WA CS
        $wa = DB::table('operators as o')
            ->leftJoin('users', 'o.user_id', '=', 'users.id')
            // ->leftJoin('closing_rates as cr', 'cr.user_id', '=', 'users.id')
            ->where('campaign_id', $campaign_id)
            ->where('users.status', 1)
            ->where('o.deleted_at', null)
            ->select('users.phone')
            // ->orderByDesc('month_closing_rate')
            ->get();

        $adv_id = DB::table('campaigns')->where('id', $campaign_id)->where('deleted_at', null)->value('user_id');
        $adv_name = DB::table('users')->where('id', $adv_id)->where('deleted_at', null)->value('name');
        $product_price = DB::table('products')->where('id', $product_id)->where('deleted_at', null)->value('price');

        // menghitung jumlah operator tiap campaign
        $operator_count = DB::table('operators')
            ->leftJoin('users', 'operators.user_id', '=', 'users.id')
            ->where('campaign_id', $campaign_id)
            ->where('operators.deleted_at', null)
            ->where('users.status', 1)
            ->count();

        // menghitung jumlah click tombol WA
        $counter = DB::table('distribution_counters')->where('campaign_id', $campaign_id)->value('counter');
        // rotasi nomer WA
        if($counter >= $operator_count-1){
            DB::table('distribution_counters')
            ->where('campaign_id', $campaign_id)
            ->update([
                'campaign_id' => $campaign_id,
                'counter' => 0
            ]);
        }else{
            DB::table('distribution_counters')->where('campaign_id', $campaign_id)->increment('counter');
        }
        $user_id = DB::table('users')->where('phone', $wa[$counter]->phone)->where('status', 1)->where('deleted_at', null)->value('id');
        $operator_id = DB::table('operators')->where('admin_id', $admin_id)->where('user_id', $user_id)->where('campaign_id', $campaign_id)->where('deleted_at', null)->value('id');
        $operator_name = DB::table('operators')->where('admin_id', $admin_id)->where('user_id', $user_id)->where('campaign_id', $campaign_id)->where('deleted_at', null)->value('name');
        $product_name = DB::table('products')->where('admin_id', $admin_id)->where('id', $product_id)->where('deleted_at', null)->value('name');
        $lead_id = DB::table('leads')->insertGetId([
            'admin_id'   => $admin_id,
            'advertiser' => $adv_name,
            'campaign_id' => $campaign_id,
            'operator_id'   => $operator_id,
            'product_id' => $product_id,
            // 'client_id'    => $client_id,
            'user_id'    => $user_id,
            'price'      => $product_price,
            'status_id'  => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->whereid($product_id)->where('deleted_at', null)->increment('lead');
        $day = Carbon::now()->format('Y-m-d');
        $data_lead = DB::table('leads')->Where('admin_id', $admin_id)->where('created_at', $day)->where('deleted_at', null)->count();

        $options = array(
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'encrypted' => true
                );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
            );

        $data['message'] = $data_lead;
        $pusher->trigger('message-channel', 'App\\Events\\MessageCreated', $data);

        // return redirect('https://api.whatsapp.com/send/?phone='.$wa[$counter]->phone.'&text='.$text);
        $client = Lead::where('admin_id', $admin_id)->where('id', $lead_id)->select('client_whatsapp as whatsapp', 'client_name as name')->get();
        return redirect('https://api.whatsapp.com/send/?phone='.$wa[$counter]->phone.'&text='.'Kode Order: ord-'.$lead_id.'%0A'.str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($client['name'] ?? 'From WA', $client['whatsapp'] ?? 'From WA', $operator_name, $product_name), $text));
    }
}
