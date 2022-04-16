<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\EventPixel;
use App\Models\EventWa;
use App\Models\Operator;
use App\Models\Product;
use App\Models\User;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
        $events = EventPixel::all();
        $eventWa = EventWa::all();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        $x=auth()->user();
        if($x->role_id == 4){
            return view('campaignADV', ['eventWa'=>$eventWa])->with('campaigns', $campaigns)->with('products', $product)->with('events', $events);
        }
        elseif($x->role_id == 12){
            return view('campaign-JA-ADV', ['eventWa'=>$eventWa])->with('campaigns', $campaigns)->with('products', $product)->with('events', $events);
        } else {
        // return view('operator', ['operators'=>$operators])->with('lead_count', $lead_count)->with('campaign_count', $campaign_count);
            return view('campaign', ['eventWa'=>$eventWa])->with('campaigns', $campaigns)->with('products', $product)->with('events', $events);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = EventPixel::all();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        return view ('CreateCampaign',['event'=>$events])->with('products', $product);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign_id = DB::table('campaigns')->insertGetId([
            'user_id'         => Auth()->user()->id,
            'admin_id'        => auth()->user()->admin_id,
            'title'           => $request->title,
            'product_id'      => $request->product_id,
            'message'         => $request->tp,
            'facebook_pixel'  => $request->fbp,
            'event_pixel_id'  => $request->event_id,
            'event_wa_id'     => $request->event_wa,
            'cs_to_customer'  => $request->cs_to_customer,
            'customer_to_cs'  => $request->customer_to_cs,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        // $campaign_id = $campaign->id;
        DB::table('distribution_counters')->insert([
            'admin_id'    => auth()->user()->admin_id,
            'campaign_id' => $campaign_id,
            'counter' => 0
        ]);
        return redirect('/campaign')->with('success','Successfull! Campaign Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($campaign)
    {
        $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->find($campaign)->get();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        return view('campaign',compact($campaigns))->with('products', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->findOrFail($id);
        $event = EventPixel::all();
        $eventWa = EventWa::all();
        $product = Product::where('admin_id', auth()->user()->admin_id)->get();
        return view('EditingCampaign',['campaign' => $campaigns])->with('event', $event)->with('products', $product)->with('eventWa', $eventWa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campaign)
    {
        if (auth()->user()->role_id == 1){
            DB::table('campaigns')->where('id', $campaign)->where('admin_id', auth()->user()->admin_id)->update([
                'admin_id'          => auth()->user()->admin_id,
                'title'             => $request->title,
                'product_id'        => $request->product_id,
                'message'           => $request->tp,
                'facebook_pixel'    => $request->fbp,
                'event_pixel_id'    => $request->event_id,
                'event_wa_id'       => $request->event_wa,
                'cs_to_customer'    => $request->cs_to_customer,
                'customer_to_cs'    => $request->customer_to_cs,
                'updated_at'        => Carbon::now()->toDateTimeString(),
            ]);
        }
        else{
            DB::table('campaigns')->where('id', $campaign)->where('admin_id', auth()->user()->admin_id)->update([
                'user_id'           => Auth()->user()->id,
                'admin_id'          => auth()->user()->admin_id,
                'title'             => $request->title,
                'product_id'        => $request->product_id,
                'message'           => $request->tp,
                'facebook_pixel'    => $request->fbp,
                'event_pixel_id'    => $request->event_id,
                'event_wa_id'       => $request->event_wa,
                'cs_to_customer'    => $request->cs_to_customer,
                'customer_to_cs'    => $request->customer_to_cs,
                'updated_at'        => Carbon::now()->toDateTimeString(),
            ]);
        }
        return redirect('/campaign')->with('success','Successull! Campaign Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //DB::delete('delete from users where id = ?', [$campaign]);
        $campaign->delete();
        return redirect('/campaign')->with('success','Successull! Campaign Deleted');
    }

    public function addOperator($id)
    {
        $day = Carbon::now()->format('Y-m-d');
        $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->findOrFail($id);
        // untuk menampilkan daftar CS di dropdown saat menambah operator
        $operators = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
        // untuk menampilkan operator berdasarkan campaign
        $operatorCampaigns = Operator::where('admin_id', auth()->user()->admin_id)->where('campaign_id', $id)->get();
        $lead = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();

        if(auth()->user()->role_id == 1){
            return view('addOperator', ['campaigns'=>$campaigns])->with('operators', $operators)->with('operatorCampaigns', $operatorCampaigns)->with('lead', $lead)
            ->with('lead_day', $lead_day);
        }
        else{
            return view('addOperatorADV', ['campaigns'=>$campaigns])->with('operators', $operators)->with('operatorCampaigns', $operatorCampaigns)->with('lead', $lead)
            ->with('lead_day', $lead_day);
        }
    }
}
