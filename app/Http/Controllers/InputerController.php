<?php

namespace App\Http\Controllers;

use App\Exports\InputersExport;
use App\Exports\OneInputerExport;
use App\Models\Announcement;
use App\Models\Campaign;
use App\Models\CsInputer;
use Illuminate\Http\Request;
use App\Models\Inputer;
use App\Models\Lead;
use App\Models\Promotion;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InputerController extends Controller
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
        $user_role_id = Auth::user()->role_id;
        $user_admin_id = Auth::user()->admin_id;
        if($user_role_id == 10){
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            // ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'l.client_name as client_name', 'l.client_whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'l.updated_at as client_updated_at', 'l.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            // dd($leads);
            $announcements = Announcement::where('admin_id', $user_admin_id)->get();
            $inputers = Inputer::where('admin_id', $user_admin_id)->whereDate('updated_at', $day)->get();
            // $all_inputers = Inputer::where('admin_id', auth()->user()->admin_id)->get();
            $payment = Inputer::where('admin_id', $user_admin_id)->whereNotNull('total_payment')->whereHas('lead', function($q){
                $q->where('status_id', 5);
            })->get(['payment_method' , 'total_payment', 'warehouse_id', 'courier']);
            $total_payment = $payment->sum('total_payment');
            $count_cod = $payment->where('payment_method', 'COD')->count();
            $payment_cod = $payment->where('payment_method', 'COD')->sum('total_payment');
            $count_transfer = $payment->where('payment_method', 'Transfer')->count();
            $payment_transfer = $payment->where('payment_method', 'Transfer')->sum('total_payment');
            // $warehouse_count = Warehouse::where('admin_id', $user_admin_id)->withCount('inputers')->get();
            // $warehouse_count = Warehouse::where('admin_id', $user_admin_id)->with('inputers', function($q){
            //     // $q->count();
            //     $q->whereHas('lead', function($q1){
            //         $q1->where('status_id', 5);
            //     });
            // })->get();
            $warehouse_count = Warehouse::all()->map(function($val) use ($payment){
                return [
                    'name' => $val->name,
                    'inputers_count' => $payment->where('warehouse_id', $val->id)->count()
                ];
            });
            $courier = $payment->map(function($val){
                return [
                    'name' => $val->courier
                ];
            });
            // return $warehouse_count->count();
            // $operators = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
            $cs = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
            $cs_inputers = CsInputer::where('admin_id', $user_admin_id)->where('inputer_id', auth()->user()->id)->get();
            $name_cs_inputers = $cs_inputers->map(function($val){
                return $val->cs->name;
            });
            // return $name_cs_inputers;
            return view('inputer.Inputer', compact('leads','warehouse_count', 'courier', 'announcements', 'count_cod','payment_cod', 'count_transfer', 'payment_transfer', 'total_payment', 'inputers', 'cs', 'cs_inputers', 'name_cs_inputers', 'day'));
        }else if($user_role_id == 1){
            // if($request->date_filter){
            //     $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            // } else {
            //     $day = Carbon::now()->format('Y-m-d');
            // }
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            // ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'l.client_name as client_name', 'l.client_whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'l.updated_at as client_updated_at', 'l.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            //dd($leads);
            $payment = Inputer::where('admin_id', $user_admin_id)->whereNotNull('total_payment')->whereHas('lead', function($q){
                $q->where('status_id', 5);
            })->get(['payment_method' , 'total_payment', 'warehouse_id', 'courier']);
            $total_payment = $payment->sum('total_payment');
            $count_cod = $payment->where('payment_method', 'COD')->count();
            $payment_cod = $payment->where('payment_method', 'COD')->sum('total_payment');
            $count_transfer = $payment->where('payment_method', 'Transfer')->count();
            $payment_transfer = $payment->where('payment_method', 'Transfer')->sum('total_payment');
            $warehouse_count = Warehouse::all()->map(function($val) use ($payment){
                return [
                    'name' => $val->name,
                    'inputers_count' => $payment->where('warehouse_id', $val->id)->count()
                ];
            });
            $courier = $payment->map(function($val){
                return [
                    'name' => $val->courier
                ];
            });
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            $promotions = Promotion::all();
            $inputers = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('updated_at', $day)->get();
            $all_inputers = Inputer::where('admin_id', auth()->user()->admin_id)->get();
            $cs = User::where('admin_id', auth()->user()->admin_id)->whereIn('role_id', [5,13])->get();
            // $cs_inputers = DB::table('cs_inputers as i')->join('users as u', 'u.id', '=', 'i.cs_id')->where('i.inputer_id', Auth::user()->id)->where('i.deleted_at', null)->select('i.id as id', 'u.name as name', 'u.email as email', 'u.phone as phone')->get();
            $cs_inputers = CsInputer::where('admin_id', auth()->user()->admin_id)->where('inputer_id', auth()->user()->id)->get();
            $name_cs_inputers = User::where('admin_id', auth()->user()->admin_id)->where('id', $cs_inputers->implode('cs_id'))->value('name');
            // dd($cs_inputers);
            return view('inputer.Dashboard', compact('leads','warehouse_count', 'courier', 'announcements','count_cod','payment_cod', 'count_transfer', 'payment_transfer', 'total_payment', 'inputers', 'all_inputers', 'cs', 'cs_inputers', 'name_cs_inputers', 'promotions', 'day'));
        }else if(Auth::user()->role_id == 12){
            if($request->date_filter){
                $day = Carbon::parse($request->date_filter)->format('Y-m-d');
            } else {
                $day = Carbon::now()->format('Y-m-d');
            }
            $leads = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            // ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('l.id as id', 'advertiser', 'l.client_name as client_name', 'l.client_whatsapp as client_wa', 'cm.cs_to_customer as text', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'l.updated_at as client_updated_at', 'l.created_at as client_created_at')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->where('l.updated_at', $day)
            ->orderByDesc('l.id')
            ->paginate(5);
            //dd($leads);
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            $inputers = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('updated_at', $day)->get();
            $all_inputers = Inputer::where('admin_id', auth()->user()->admin_id)->get();
            $cs = User::where('admin_id', auth()->user()->admin_id)->whereIn('role_id', [5,13])->get();
            // $cs_inputers = DB::table('cs_inputers as i')->join('users as u', 'u.id', '=', 'i.cs_id')->where('i.inputer_id', Auth::user()->id)->where('i.deleted_at', null)->select('i.id as id', 'u.name as name', 'u.email as email', 'u.phone as phone')->get();
            $cs_inputers = CsInputer::where('admin_id', auth()->user()->admin_id)->where('inputer_id', auth()->user()->id)->get();
            $name_cs_inputers = User::where('admin_id', auth()->user()->admin_id)->where('id', $cs_inputers->implode('cs_id'))->value('name');
            // dd($cs_inputers);
            return view('inputer.inputerJA', compact(['leads', 'announcements', 'inputers', 'all_inputers', 'cs', 'cs_inputers', 'name_cs_inputers', 'day']));
        }else{
            return redirect()->back();
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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

    public function view($id)
    {
        $inputers = Inputer::findOrFail($id);
        $province_id = $inputers->province_id;

        if(isset($province_id)){
            $city_id = $inputers->city_id;
            $subdistrict_id = $inputers->subdistrict_id;
            $province = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province?id='.$province_id);
            $province = $province['rajaongkir']['results']['province'];
            $city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?id='.$city_id.'&province='.$province_id);
            $city = $city['rajaongkir']['results']['city_name'];
            $subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?id='.$subdistrict_id.'&city='.$city_id);
            $subdistrict = $subdistrict['rajaongkir']['results']['subdistrict_name'];
            return view('inputer.viewdata', compact(['inputers', 'province', 'city', 'subdistrict']));
        }
        else{
            return view('inputer.viewdata', compact(['inputers']));
        }
    }
    public function export(Request $request)
    {
        $daterange = explode(' - ', $request->daterange);
        return Excel::download(new InputersExport($daterange[0],$daterange[1]), 'Data Inputer '.date("d F Y", strtotime($daterange[0])).' - '.date("d F Y", strtotime($daterange[1])).'.xlsx', 'Xlsx');
    }
    public function exportOne($id)
    {
        return Excel::download(new OneInputerExport($id), 'inputerOneData.xlsx', 'Xlsx');
    }
    public function addCS(Request $request){
        $CsExists = CsInputer::where('admin_id', auth()->user()->admin_id)->where('inputer_id', auth()->user()->id)->where('cs_id', $request->cs_id)->exists();
        if($CsExists){
            return back()->with('error','Error!, Customer Service already exists');
        }
        CsInputer::create([
            'admin_id' => Auth::user()->admin_id,
            'inputer_id' => Auth::user()->id,
            'cs_id' => $request->cs_id
        ]);
        return back()->with('success','Successull! Customer Service Added');
    }
    public function CS_destroy($id){
        $cs_inputer = CsInputer::find($id);
        $cs_inputer->delete();
        return back()->with('success','Successull! Customer Service Deleted');
    }
}
