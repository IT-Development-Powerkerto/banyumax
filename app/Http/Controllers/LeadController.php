<?php

namespace App\Http\Controllers;

use App\Exports\LeadsExport;
// use App\Models\Client;
use App\Models\Lead;
use App\Models\Promotion;
use App\Models\Inputer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use File;
use App\Http\Resources\LeadResource;
use App\Models\Operator;
use App\Models\Product;
use App\Models\User;
use App\Models\Campaign;
use App\Models\CsInputer;
use App\Models\Warehouse;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->date_filter){
            $day = Carbon::parse($request->date_filter)->format('Y-m-d');
        } else {
            $day = Carbon::now()->format('Y-m-d');
        }
        $data = Lead::orderByDesc('id')->get();
        // $data = DB::table('leads as l')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
        //     ->select('l.id as id', 'advertiser', 'c.name as client_name', 'c.whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.updated_at as client_updated_at', 'c.created_at as client_created_at');

        return response()->json([LeadResource::collection($data), 'Leads fetched.']);
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
        // ddd($request->all());
        $product_id = Campaign::where('id', $request->campaign_id)->value('product_id');
        $operator_id = Operator::where('campaign_id', $request->campaign_id)->where('user_id', auth()->user()->id)->value('id');
        $advertiser = User::where('id', Campaign::where('id', $request->campaign_id)->value('user_id'))->value('name');
        DB::table('leads')->insert([
            'admin_id'        => auth()->user()->admin_id,
            'advertiser'      => $advertiser,
            'operator_id'     => $operator_id,
            'campaign_id'     => $request->campaign_id,
            'client_name'     => $request->customer_name,
            'client_whatsapp' => $request->customer_number,
            'product_id'      => $product_id,
            'user_id'         => auth()->user()->id,
            'price'           => Product::where('id', $product_id)->value('price'),
            'status_id'       => 3,
            'created_at'      => $request->date,
            'updated_at'      => $request->date,
        ]);

        return redirect('/dashboard')->with('success','Successull! Lead Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $lead = Lead::findOrFail($id);
        session(['previous-url' => url()->previous()]);
        $products = Product::all();
        // $lead = DB::table('leads as l')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     // ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cp', 'l.campaign_id', '=', 'cp.id')
        //     ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'l.client_name as client_name', 'l.client_whatsapp as client_wa', 'l.created_at as client_created_at', 'l.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer', 's.name as status_name')
        //     ->where('l.id', $id)
        //     ->where('l.admin_id', auth()->user()->admin_id);
        $lead = Lead::whereId($id)->with([
            'operator' => function($q){
                $q->withTrashed();
            },
            'product' , 'status', 'campaign', 'inputer'])->withTrashed()->first();
        // return $lead->inputer->warehouse_id;

        $user_inputers = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 10)->select('id', 'name')->get();
        // $inputer = DB::table('inputers as i')
        //     ->join('leads as l', 'i.lead_id', '=', 'l.id')
        //     ->select('i.customer_address as address', 'i.payment_method as payment_method', 'i.warehouse as warehouse', 'i.courier as courier', 'i.payment_proof as image', 'i.product_weight as product_weight', 'i.product_promotion as product_promotion', 'i.shipping_promotion as shipping_promotion', 'i.province_id as province', 'i.total_price as total_price', 'i.shipping_price as shipping_price', 'i.total_payment as total_payment', 'i.province_id as province_id', 'i.city_id as city_id', 'i.subdistrict_id as subdistrict_id', 'i.product_promotion_id as product_promotion_id', 'i.shipping_promotion_id as shipping_promotion_id', 'i.admin_promotion_id as admin_promotion_id', 'i.product_promotion_id as add_product_promotion_id', 'i.add_shipping_promotion_id as add_shipping_promotion_id', 'i.add_admin_promotion_id as add_admin_promotion_id')
        //     ->where('l.id', $id)
        //     ->where('l.admin_id', auth()->user()->admin_id);
        // $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->where('lead_id', $id)->with('lead')->first();
        // $inputer = Inputer::where('admin_id', auth()->user()->admin_id)->with('lead', function($q) use($id){
        //     $q->where('id', $id);
        // })->first();
        // return $inputer;
        $user_admin_id = auth()->user()->admin_id;
        $warehouses = Warehouse::where('admin_id', $user_admin_id)->get();
        $product_promotion = Promotion::where('admin_id', $user_admin_id)->where('promotion_type', 'Product Price')->where('user_id', auth()->user()->id)->get();
        $shipping_promotion = Promotion::where('admin_id', $user_admin_id)->where('promotion_type', 'Shipping Cost')->where('user_id', auth()->user()->id)->get();
        $admin_promotion = Promotion::where('admin_id', $user_admin_id)->where('promotion_type', 'Admin Cost')->where('user_id', auth()->user()->id)->get();
        // return $promotion;
        // return view('EditingLT', compact('lead'));
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province');
        $response = json_decode($response, true);
        $all_province = $response['rajaongkir']['results'];
        $province_id = DB::table('inputers as i')
        ->join('leads as l', 'i.lead_id', '=', 'l.id')
        ->where('l.id', $id)
        ->where('l.admin_id', auth()->user()->admin_id)
        ->value('i.province_id');
        if(isset($province_id)){

            $all_city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?&province='.$province_id);
            $all_city = json_decode($all_city, true);
            $all_city = $all_city['rajaongkir']['results'];
            $city_id = DB::table('inputers as i')
            ->join('leads as l', 'i.lead_id', '=', 'l.id')
            ->where('l.id', $id)
            ->where('l.admin_id', auth()->user()->admin_id)
            ->value('i.city_id');
            $all_subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$city_id);
            $all_subdistrict = json_decode($all_subdistrict, true);
            $all_subdistrict = $all_subdistrict['rajaongkir']['results'];

            if(Auth::user()->role_id == 1){
                return view('EditingLT', compact('lead', 'warehouses','products','user_inputers' ,'all_province', 'all_city', 'all_subdistrict', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }else if(Auth::user()->role_id == 4){
                return view('EditingLTADV', compact('lead', 'warehouses','products','user_inputers', 'all_province', 'all_city', 'all_subdistrict', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }else if(Auth::user()->role_id == 5 || Auth::user()->role_id == 13){
                return view('EditingLTCS', compact('lead', 'warehouses','products','user_inputers', 'all_province', 'all_city', 'all_subdistrict', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }
        }else{
            if(Auth::user()->role_id == 1){
                return view('EditingLT', compact('lead', 'warehouses','products','user_inputers', 'all_province', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }else if(Auth::user()->role_id == 4){
                return view('EditingLTADV', compact('lead', 'warehouses','products','user_inputers', 'all_province', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }else if(Auth::user()->role_id == 5 || Auth::user()->role_id == 13){
                return view('EditingLTCS', compact('lead', 'warehouses','products','user_inputers', 'all_province', 'product_promotion', 'shipping_promotion', 'admin_promotion'));
            }
        }
    }
    public function update(Request $request, $lead)
    {
        // dd(session('previous-url'));
        // dd($request->all());
        //$total_price = ($request->price * $request->quantity) - $request->promotion_name;
        //$total_payment = $total_price + $request->shipping_price;

        if(substr(trim($request->whatsapp), 0, 1)=='0'){
            $whatsapp = '62'.substr(trim($request->whatsapp), 1);
        } else{
            $whatsapp = $request->whatsapp;
        }
        $warehouse = explode('_', $request->warehouse);
        $warehouse = $warehouse[0];

        // dd($whatsapp);

        // dd($province, $city, $subdistrict);

        if($request->status_id == 5){
            $validator = Validator::make($request->all(), [
                'status_id'         => 'required',
                'name'              => 'required',
                'whatsapp'          => 'required',
                'address'           => 'required',
                'quantity'          => 'required',
                'price'             => 'required',
                'product_promotion' => 'required',
                'total_price'       => 'required',
                'weight'            => 'required',
                'warehouse'         => 'required',
                'province_id'          => 'required',
                'city_id'              => 'required',
                'subdistrict_id'       => 'required',
                'courier'           => 'required',
                'shipping_promotion'=> 'required',
                'shipping_price'    => 'required',
                'payment_method'    => 'required',
                'total_payment'     => 'required',
            ]);
            if($validator->fails()){
                // return back()->with('error','Error! User not been Added')->withInput()->withErrors($validator);
                return redirect()->back()->withInput();
                // return 'gagal';
            }
            else{
                $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?id='.$request->subdistrict_id);
                $response = json_decode($response, true);
                $province = $response['rajaongkir']['results']['province'];
                $city = $response['rajaongkir']['results']['city'];
                $subdistrict = $response['rajaongkir']['results']['subdistrict_name'];
                // DB::table('clients')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
                //     'name'         => $request->name,
                //     'whatsapp'     => $whatsapp,
                //     'updated_at'   => Carbon::now()->toDateTimeString(),
                // ]);
                DB::table('leads')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
                    // 'client_id'       => $lead,
                    'client_name'         => $request->name,
                    'client_whatsapp'     => $whatsapp,
                    'quantity'        => $request->quantity,
                    'price'           => $request->price,
                    'total_price'     => $request->total_price,
                    'status_id'       => $request->status_id,
                    'updated_at'      => Carbon::now()->toDateTimeString(),
                ]);
                $inputer = Inputer::where('lead_id', $lead)->exists();
                $lead = Lead::findOrFail($lead);

                if($inputer == true){
                    $order_image = Inputer::where('lead_id', $lead->id)->get();
                    if($request->hasFile('image')){
                        $extFile = $request->image->getClientOriginalExtension();
                        $namaFile = 'order-'.time().".".$extFile;
                        File::delete($order_image->implode('payment_proof'));
                        $path = $request->image->move('public/assets/img/order',$namaFile);
                        $image = $path;
                    } else {
                        $image = null;
                    }
                    Inputer::where('lead_id', $lead->id)->update([
                        'admin_id'                  => $lead->admin_id,
                        'lead_id'                   => $lead->id,
                        'adv_name'                  => $lead->advertiser,
                        'operator_name'             => $lead->user->name,
                        'customer_name'             => $request->name,
                        'customer_number'           => $whatsapp,
                        'customer_address'          => $request->address,
                        'product_name'              => $lead->product->name,
                        'product_price'             => $request->price,
                        'product_weight'            => $request->weight,
                        'quantity'                  => $request->quantity,
                        'product_promotion_id'      => $request->product_promotion_id,
                        'product_promotion'         => $request->ori_product_promotion,
                        'add_product_promotion_id'  => $request->add_product_promotion_id,
                        'add_product_promotion'     => $request->add_product_promotion,
                        'total_price'               => $request->total_price,
                        'warehouse_id'                 => $warehouse,
                        'province_id'               => $request->province_id,
                        'province'                  => $province,
                        'city_id'                   => $request->city_id,
                        'city'                      => $city,
                        'subdistrict_id'            => $request->subdistrict_id,
                        'subdistrict'               => $subdistrict,
                        'courier'                   => $request->courier,
                        'shipping_price'            => $request->shipping_price,
                        'shipping_promotion_id'     => $request->shipping_promotion_id,
                        'shipping_promotion'        => $request->ori_shipping_promotion,
                        'add_shipping_promotion_id' => $request->add_shipping_promotion_id,
                        'add_shipping_promotion'    => $request->add_shipping_promotion,
                        'total_shipping'            => $request->total_shipping,
                        'shipping_admin'            => $request->shipping_admin,
                        'admin_promotion_id'        => $request->admin_promotion_id,
                        'admin_promotion'           => $request->ori_admin_promotion,
                        'add_admin_promotion_id'    => $request->add_admin_promotion_id,
                        'add_admin_promotion'       => $request->add_admin_promotion,
                        'total_admin'               => $request->total_admin,
                        'payment_method'            => $request->payment_method,
                        'total_payment'             => $request->total_payment,
                        'payment_proof'             => $image,
                    ]);
                }
                else{
                    if($request->hasFile('image')){
                        $extFile = $request->image->getClientOriginalExtension();
                        $namaFile = 'order-'.time().".".$extFile;
                        $path = $request->image->move('public/assets/img/order',$namaFile);
                        $image = $path;
                    } else {
                        $image = null;
                    }
                    Inputer::create([
                        'admin_id'                  => $lead->admin_id,
                        'lead_id'                   => $lead->id,
                        'adv_name'                  => $lead->advertiser,
                        'operator_name'             => $lead->user->name,
                        'customer_name'             => $request->name,
                        'customer_number'           => $whatsapp,
                        'customer_address'          => $request->address,
                        'product_name'              => $lead->product->name,
                        'product_price'             => $request->price,
                        'product_weight'            => $request->weight,
                        'quantity'                  => $request->quantity,
                        'product_promotion_id'      => $request->product_promotion_id,
                        'product_promotion'         => $request->ori_product_promotion,
                        'add_product_promotion_id'  => $request->add_product_promotion_id,
                        'add_product_promotion'     => $request->add_product_promotion,
                        'total_price'               => $request->total_price,
                        'warehouse_id'                 => $warehouse,
                        'province_id'               => $request->province_id,
                        'province'                  => $province,
                        'city_id'                   => $request->city_id,
                        'city'                      => $city,
                        'subdistrict_id'            => $request->subdistrict_id,
                        'subdistrict'               => $subdistrict,
                        'courier'                   => $request->courier,
                        'shipping_price'            => $request->shipping_price,
                        'shipping_promotion_id'     => $request->shipping_promotion_id,
                        'shipping_promotion'        => $request->ori_shipping_promotion,
                        'add_shipping_promotion_id' => $request->add_shipping_promotion_id,
                        'add_shipping_promotion'    => $request->add_shipping_promotion,
                        'total_shipping'            => $request->total_shipping,
                        'shipping_admin'            => $request->shipping_admin,
                        'admin_promotion_id'        => $request->admin_promotion_id,
                        'admin_promotion'           => $request->ori_admin_promotion,
                        'add_admin_promotion_id'    => $request->add_admin_promotion_id,
                        'add_admin_promotion'       => $request->add_admin_promotion,
                        'total_admin'               => $request->total_admin,
                        'payment_method'            => $request->payment_method,
                        'total_payment'             => $request->total_payment,
                        'payment_proof'             => $image,
                    ]);
                }
            }
        }
        else{
            // DB::table('clients')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
            //     'name'         => $request->name,
            //     'whatsapp'     => $whatsapp,
            //     'updated_at'   => Carbon::now()->toDateTimeString(),
            // ]);
            DB::table('leads')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
                // 'client_id'       => $lead,
                'client_name'         => $request->name,
                'client_whatsapp'     => $whatsapp,
                'quantity'        => $request->quantity,
                'price'           => $request->price,
                'total_price'     => $request->total_price,
                'status_id'       => $request->status_id,
                'updated_at'      => Carbon::now()->toDateTimeString(),
            ]);
        }
        return redirect(session('previous-url'))->with('success','Successull! Updated');
    }

    // Cross Selling Project
    // public function update(Request $request, $lead)
    // {
    //     // dd(session('previous-url'));
    //     // dd($request->all());
    //     //$total_price = ($request->price * $request->quantity) - $request->promotion_name;
    //     //$total_payment = $total_price + $request->shipping_price;


    //     // $product_name = ;
    //     $product_id = Product::where('name', $request->product_name)->value('id');
    //     // dd($product_id);
    //     if(substr(trim($request->whatsapp), 0, 1)=='0'){
    //         $whatsapp = '62'.substr(trim($request->whatsapp), 1);
    //     } else{
    //         $whatsapp = $request->whatsapp;
    //     }

    //     // dd($whatsapp);

    //     // dd($province, $city, $subdistrict);

    //     if($request->status_id == 5){
    //         $validator = Validator::make($request->all(), [
    //             'status_id'         => 'required',
    //             'name'              => 'required',
    //             'whatsapp'          => 'required',
    //             'address'           => 'required',
    //             'quantity'          => 'required',
    //             'price'             => 'required',
    //             'product_promotion' => 'required',
    //             'total_price'       => 'required',
    //             'weight'            => 'required',
    //             'warehouse'         => 'required',
    //             'province_id'          => 'required',
    //             'city_id'              => 'required',
    //             'subdistrict_id'       => 'required',
    //             'courier'           => 'required',
    //             'shipping_promotion'=> 'required',
    //             'shipping_price'    => 'required',
    //             'payment_method'    => 'required',
    //             'total_payment'     => 'required',
    //         ]);
    //         if($validator->fails()){
    //             // return back()->with('error','Error! User not been Added')->withInput()->withErrors($validator);
    //             return redirect()->back()->withInput();
    //             // return 'gagal';
    //         }
    //         else{
    //             $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?id='.$request->subdistrict_id);
    //             $response = json_decode($response, true);
    //             $province = $response['rajaongkir']['results']['province'];
    //             $city = $response['rajaongkir']['results']['city'];
    //             $subdistrict = $response['rajaongkir']['results']['subdistrict_name'];
    //             // DB::table('clients')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
    //             //     'name'         => $request->name,
    //             //     'whatsapp'     => $whatsapp,
    //             //     'updated_at'   => Carbon::now()->toDateTimeString(),
    //             // ]);
    //             DB::table('leads')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
    //                 // 'client_id'       => $lead,
    //                 'client_name'         => $request->name,
    //                 'client_whatsapp'     => $whatsapp,
    //                 'product_id' => $product_id,
    //                 'quantity'        => $request->quantity,
    //                 'price'           => $request->price,
    //                 'total_price'     => $request->total_price,
    //                 'status_id'       => $request->status_id,
    //                 // 'updated_at'      => Carbon::now()->toDateTimeString(),
    //             ]);
    //             $inputer = Inputer::where('lead_id', $lead)->exists();
    //             $lead = Lead::findOrFail($lead);
    //             CsInputer::create([
    //                 'admin_id' => Auth::user()->admin_id,
    //                 'inputer_id' => $request->inputer_id,
    //                 'cs_id' => Auth::id()
    //             ]);
    //             if($inputer == true){
    //                 $order_image = Inputer::where('lead_id', $lead->id)->get();
    //                 if($request->hasFile('image')){
    //                     $extFile = $request->image->getClientOriginalExtension();
    //                     $namaFile = 'order-'.time().".".$extFile;
    //                     File::delete($order_image->implode('payment_proof'));
    //                     $path = $request->image->move('public/assets/img/order',$namaFile);
    //                     $image = $path;
    //                 } else {
    //                     $image = null;
    //                 }
    //                 Inputer::where('lead_id', $lead->id)->update([
    //                     'admin_id'                  => $lead->admin_id,
    //                     'lead_id'                   => $lead->id,
    //                     'adv_name'                  => $lead->advertiser,
    //                     'operator_name'             => $lead->user->name,
    //                     'customer_name'             => $request->name,
    //                     'customer_number'           => $whatsapp,
    //                     'customer_address'          => $request->address,
    //                     'sale_type'                 => $request->sale_type,
    //                     'product_name'              => $request->product_name,
    //                     'product_price'             => $request->price,
    //                     'product_weight'            => $request->weight,
    //                     'quantity'                  => $request->quantity,
    //                     'product_promotion_id'      => $request->product_promotion_id,
    //                     'product_promotion'         => $request->ori_product_promotion,
    //                     'add_product_promotion_id'  => $request->add_product_promotion_id,
    //                     'add_product_promotion'     => $request->add_product_promotion,
    //                     'total_price'               => $request->total_price,
    //                     'warehouse'                 => $request->warehouse,
    //                     'province_id'               => $request->province_id,
    //                     'province'                  => $province,
    //                     'city_id'                   => $request->city_id,
    //                     'city'                      => $city,
    //                     'subdistrict_id'            => $request->subdistrict_id,
    //                     'subdistrict'               => $subdistrict,
    //                     'courier'                   => $request->courier,
    //                     'shipping_price'            => $request->shipping_price,
    //                     'shipping_promotion_id'     => $request->shipping_promotion_id,
    //                     'shipping_promotion'        => $request->ori_shipping_promotion,
    //                     'add_shipping_promotion_id' => $request->add_shipping_promotion_id,
    //                     'add_shipping_promotion'    => $request->add_shipping_promotion,
    //                     'total_shipping'            => $request->total_shipping,
    //                     'shipping_admin'            => $request->shipping_admin,
    //                     'admin_promotion_id'        => $request->admin_promotion_id,
    //                     'admin_promotion'           => $request->ori_admin_promotion,
    //                     'add_admin_promotion_id'    => $request->add_admin_promotion_id,
    //                     'add_admin_promotion'       => $request->add_admin_promotion,
    //                     'total_admin'               => $request->total_admin,
    //                     'payment_method'            => $request->payment_method,
    //                     'total_payment'             => $request->total_payment,
    //                     'payment_proof'             => $image,
    //                     'updated_at'                => Carbon::now()->toDateTimeString(),
    //                 ]);
    //             }
    //             else{
    //                 if($request->hasFile('image')){
    //                     $extFile = $request->image->getClientOriginalExtension();
    //                     $namaFile = 'order-'.time().".".$extFile;
    //                     $path = $request->image->move('public/assets/img/order',$namaFile);
    //                     $image = $path;
    //                 } else {
    //                     $image = null;
    //                 }
    //                 Inputer::create([
    //                     'admin_id'                  => $lead->admin_id,
    //                     'lead_id'                   => $lead->id,
    //                     'adv_name'                  => $lead->advertiser,
    //                     'operator_name'             => $lead->user->name,
    //                     'customer_name'             => $request->name,
    //                     'customer_number'           => $whatsapp,
    //                     'customer_address'          => $request->address,
    //                     'sale_type'                 => $request->sale_type,
    //                     'product_name'              => $request->product_name,
    //                     'product_price'             => $request->price,
    //                     'product_weight'            => $request->weight,
    //                     'quantity'                  => $request->quantity,
    //                     'product_promotion_id'      => $request->product_promotion_id,
    //                     'product_promotion'         => $request->ori_product_promotion,
    //                     'add_product_promotion_id'  => $request->add_product_promotion_id,
    //                     'add_product_promotion'     => $request->add_product_promotion,
    //                     'total_price'               => $request->total_price,
    //                     'warehouse'                 => $request->warehouse,
    //                     'province_id'               => $request->province_id,
    //                     'province'                  => $province,
    //                     'city_id'                   => $request->city_id,
    //                     'city'                      => $city,
    //                     'subdistrict_id'            => $request->subdistrict_id,
    //                     'subdistrict'               => $subdistrict,
    //                     'courier'                   => $request->courier,
    //                     'shipping_price'            => $request->shipping_price,
    //                     'shipping_promotion_id'     => $request->shipping_promotion_id,
    //                     'shipping_promotion'        => $request->ori_shipping_promotion,
    //                     'add_shipping_promotion_id' => $request->add_shipping_promotion_id,
    //                     'add_shipping_promotion'    => $request->add_shipping_promotion,
    //                     'total_shipping'            => $request->total_shipping,
    //                     'shipping_admin'            => $request->shipping_admin,
    //                     'admin_promotion_id'        => $request->admin_promotion_id,
    //                     'admin_promotion'           => $request->ori_admin_promotion,
    //                     'add_admin_promotion_id'    => $request->add_admin_promotion_id,
    //                     'add_admin_promotion'       => $request->add_admin_promotion,
    //                     'total_admin'               => $request->total_admin,
    //                     'payment_method'            => $request->payment_method,
    //                     'total_payment'             => $request->total_payment,
    //                     'payment_proof'             => $image,
    //                     'created_at'                => Carbon::now()->toDateTimeString(),
    //                     'updated_at'                => Carbon::now()->toDateTimeString(),
    //                 ]);
    //             }
    //         }
    //     }
    //     else{
    //         // DB::table('clients')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
    //         //     'name'         => $request->name,
    //         //     'whatsapp'     => $whatsapp,
    //         //     'updated_at'   => Carbon::now()->toDateTimeString(),
    //         // ]);
    //         DB::table('leads')->where('id', $lead)->where('admin_id', auth()->user()->admin_id)->update([
    //             // 'client_id'       => $lead,
    //             'client_name'         => $request->name,
    //             'client_whatsapp'     => $whatsapp,
    //             'product_id' => $product_id,
    //             'quantity'        => $request->quantity,
    //             'price'           => $request->price,
    //             'total_price'     => $request->total_price,
    //             'status_id'       => $request->status_id,
    //             'updated_at'      => Carbon::now()->toDateTimeString(),
    //         ]);
    //     }
    //     return redirect(session('previous-url'))->with('success','Successull! Updated');
    // }


    public function destroy(Lead $lead)
    {
        // dd($lead);
        $lead->delete();
        // $client = Client::whereid($lead->client_id);
        // $client->delete();
        DB::table('products')->whereid($lead->product_id)->decrement('lead');
        return redirect('/dashboard')->with('success','Successull! Lead Deleted');
    }
    public function export(Request $request)
    {
        $from_date=$request->from_date;
        $to_date = $request->to_date;
        // dd($from_date);
        return Excel::download(new LeadsExport($from_date,$to_date), 'leads.xlsx', 'Xlsx');
    }
    public function changeStatus($lead){
        // $lead = DB::table('leads')->where('id', $lead)->get();
        // return $lead;
        DB::table('leads')->where('id', $lead)->update([
            'status_id' => 4,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        // DB::table('clients')->where('id', $lead)->update([
        //     'updated_at'   => Carbon::now()->toDateTimeString(),
        // ]);
        $user_id = DB::table('leads')->where('id', $lead)->where('deleted_at', null)->value('user_id');
        // $phone = DB::table('users')->whereId($user_id)->value('phone');
        $campaign_id = DB::table('leads')->where('id', $lead)->where('deleted_at', null)->value('campaign_id');
        // $client_id = DB::table('leads')->where('id', $lead)->where('deleted_at', null)->value('client_id');
        $client_name = Lead::where('id', $lead)->value('client_name');
        $client_number = Lead::where('id', $lead)->value('client_whatsapp');
        $operator_name = Operator::where('campaign_id', $campaign_id)->where('deleted_at', null)->where('user_id', $user_id)->value('name');
        $product_id = DB::table('leads')->where('id', $lead)->where('deleted_at', null)->value('product_id');
        $product_name = Product::where('id', $product_id)->where('deleted_at', null)->value('name');
        $FU_text = DB::table('campaigns')->where('id', $campaign_id)->where('deleted_at', null)->value('cs_to_customer');
        return redirect('https://api.whatsapp.com/send/?phone='.$client_number.'&text='.rawurlencode(str_replace(array('[cname]', '[cphone]', '[oname]', '[product]'), array($client_name, $client_number, $operator_name, $product_name), $FU_text)));
    }

}
