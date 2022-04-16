<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Inputer;
use App\Models\Product;
use App\Models\User;
use App\Models\Budgeting;
use App\Models\Evaluation;
use App\Models\BudgetingRealization;
use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day = Carbon::now()->format('Y-m-d');
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
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->where('created_at', $day)->count();

        //lead this day
        $lead_day_count = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->count();
        //count lead every day
        $lead_mo = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $lead_tu = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $lead_we = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $lead_th = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $lead_fr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $lead_sa = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $lead_su = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_max = max($lead_mo->count(), $lead_tu->count(), $lead_we->count(), $lead_th->count(), $lead_fr->count(), $lead_sa->count(), $lead_su->count());

        //count lead closing every month
        $closing_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $closing_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $closing_we = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $closing_th = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $closing_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $closing_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $closing_su = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();
        $closing_max = max($closing_mo->count(), $closing_tu->count(), $closing_we->count(), $closing_th->count(), $closing_fr->count(), $closing_sa->count(), $closing_su->count());
        //omset this day

        $omset_day_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('product_promotion');
        //count omset every month
        $omset_mo = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $omset_tu = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $omset_we = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $omset_th = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $omset_fr = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $omset_sa = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $omset_su = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //advertising cost this day
        $advertising_day_count = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->where('updated_at', $day)->sum('requirement');
        //count advertising cost every month
        $advertising_mo = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->sum('requirement');
        $advertising_tu = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->sum('requirement');
        $advertising_we = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->sum('requirement');
        $advertising_th = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->sum('requirement');
        $advertising_fr = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->sum('requirement');
        $advertising_sa = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->sum('requirement');
        $advertising_su = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->where('created_at', $day)->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('product_promotion');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('product_promotion');
        $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_permonth = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('product_promotion');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        // dd($lead_all);
        $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
        $budgeting_day = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->where('created_at', $day)->sum('requirement');
        $budgeting_week = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        $budgeting_month = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        $budgeting_all = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->get();
        $budgeting_adv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_nonadv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $budgeting_realization_adv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_realization_nonadv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $evaluation = Evaluation::where('admin_id', auth()->user()->admin_id)->get();
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            if(Auth::user()->role_id == 3){
                return view('manager.Manager', compact(['leads', 'lead_max', 'closing_max', 'products', 'announcements', 'lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
                ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
                ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
                ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count)
                ->with('evaluation', $evaluation);
            }elseif(Auth::user()->role_id == 1){
                return view('manager.Dashboard', compact(['leads', 'lead_max', 'closing_max', 'announcements', 'lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
                ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
                ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
                ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count)
                ->with('evaluation', $evaluation);
            }else {
                return redirect()->back();
            }
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

    public function approve($id){
        DB::table('budgetings')->where('id', $id)->update([
            'status' => 1,
            'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        return Redirect::back();
    }

    public function reject($id){
        DB::table('budgetings')->where('id', $id)->update([
            'status' => 0,
            'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        return Redirect::back();
    }

    public function WeeklyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
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
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();

        //lead this week
        $lead_week_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        //count lead every week
        $lead_week1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $lead_week2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $lead_week3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $lead_week4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_week_max = max($lead_week1->count(), $lead_week2->count(), $lead_week3->count(), $lead_week4->count());

        //count lead closing every week
        $closing_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $closing_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $closing_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $closing_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $closing_week_max = max($closing_week1->count(), $closing_week2->count(), $closing_week3->count(), $closing_week4->count());

        //omset this week
        $omset_week_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('product_promotion');
        //count omset every month
        $omset_week1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset_week2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset_week3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset_week4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();

        //advertising cost this week
        $advertising_week_count = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        //count advertising cost every month
        $advertising_week1 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->sum('requirement');
        $advertising_week2 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->sum('requirement');
        $advertising_week3 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->sum('requirement');
        $advertising_week4 = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('product_promotion');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('product_promotion');
        $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_permonth = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('product_promotion');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        // dd($lead_all);
        $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
        $budgeting_day = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->where('created_at', $day)->sum('requirement');
        $budgeting_week = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        $budgeting_month = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        $budgeting_all = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->get();
        $budgeting_adv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_nonadv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $budgeting_realization_adv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_realization_nonadv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $evaluation = Evaluation::where('admin_id', auth()->user()->admin_id)->get();

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            if(Auth::user()->role_id == 3){
                return view('manager.WeeklyDashboard', compact(['leads', 'announcements','lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
                ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
                ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
                ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
                ->with('lead_week_max', $lead_week_max)->with('closing_week_max', $closing_week_max)
                ->with('evaluation', $evaluation);
            }elseif(Auth::user()->role_id == 1){
                return view('manager.AdminWeeklyDashboard', compact(['leads', 'announcements', 'lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
                ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
                ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
                ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
                ->with('lead_week_max', $lead_week_max)->with('closing_week_max', $closing_week_max)
                ->with('evaluation', $evaluation);
            }else {
                return redirect()->back();
            }
        }
    }
    public function MonthlyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
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
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();

        //lead this mount
        $lead_month_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        //count lead every month
        $lead_jan = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $lead_feb = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $lead_mar = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $lead_apr = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $lead_may = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $lead_jun = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $lead_jul = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $lead_aug = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $lead_sep = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $lead_okt = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $lead_nov = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $lead_des = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();
        $lead_month_max = max($lead_jan->count(), $lead_feb->count(), $lead_mar->count(), $lead_apr->count(), $lead_may->count(), $lead_jun->count(), $lead_jul->count(), $lead_aug->count(), $lead_sep->count(), $lead_okt->count(), $lead_nov->count(), $lead_des->count());

        //count lead closing every month
        $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();
        $closing_month_max = max($closing_jan->count(), $closing_feb->count(), $closing_mar->count(), $closing_apr->count(), $closing_may->count(), $closing_jun->count(), $closing_jul->count(), $closing_aug->count(), $closing_sep->count(), $closing_okt->count(), $closing_nov->count(), $closing_des->count());

        //omset this month
        $omset_month_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('product_promotion');
        //count omset every month
        $omset_jan = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $omset_feb = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $omset_mar = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $omset_apr = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $omset_may = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $omset_jun = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $omset_jul = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $omset_aug = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $omset_sep = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $omset_okt = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $omset_nov = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $omset_des = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();

        //advertising this month
        $advertising_month_count = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        //count advertising every month
        $advertising_jan = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->sum('requirement');
        $advertising_feb = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->sum('requirement');
        $advertising_mar = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->sum('requirement');
        $advertising_apr = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->sum('requirement');
        $advertising_may = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->sum('requirement');
        $advertising_jun = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->sum('requirement');
        $advertising_jul = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->sum('requirement');
        $advertising_aug = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->sum('requirement');
        $advertising_sep = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->sum('requirement');
        $advertising_okt = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->sum('requirement');
        $advertising_nov = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->sum('requirement');
        $advertising_des = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->where('status', 1)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->sum('requirement');

        $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('created_at', $day)->get();
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('product_promotion');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('product_promotion');
        $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_permonth = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price') - Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('product_promotion');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        // dd($lead_all);
        $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
        $budgeting_day = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->where('created_at', $day)->sum('requirement');
        $budgeting_week = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        $budgeting_month = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        $budgeting_all = Budgeting::where('admin_id', auth()->user()->admin_id)->where('status', 1)->get();
        $budgeting_adv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_nonadv = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $budgeting_realization_adv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
        $budgeting_realization_nonadv = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        $evaluation = Evaluation::where('admin_id', auth()->user()->admin_id)->get();

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }else{
            if(Auth::user()->role_id == 3){
                return view('manager.MonthlyDashboard', compact(['leads', 'announcements','lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_jan', $omset_jan)->with('omset_feb', $omset_feb)->with('omset_mar', $omset_mar)->with('omset_apr', $omset_apr)->with('omset_may', $omset_may)->with('omset_jun', $omset_jun)
                ->with('omset_jul', $omset_jul)->with('omset_aug', $omset_aug)->with('omset_sep', $omset_sep)->with('omset_okt', $omset_okt)->with('omset_nov', $omset_nov)->with('omset_des', $omset_des)
                ->with('advertising_jan', $advertising_jan)->with('advertising_feb', $advertising_feb)->with('advertising_mar', $advertising_mar)->with('advertising_apr', $advertising_apr)->with('advertising_may', $advertising_may)->with('advertising_jun', $advertising_jun)
                ->with('advertising_jul', $advertising_jul)->with('advertising_aug', $advertising_aug)->with('advertising_sep', $advertising_sep)->with('advertising_okt', $advertising_okt)->with('advertising_nov', $advertising_nov)->with('advertising_des', $advertising_des)
                ->with('lead_month_count', $lead_month_count)->with('omset_month_count', $omset_month_count)->with('advertising_month_count', $advertising_month_count)
                ->with('lead_month_max', $lead_month_max)->with('closing_month_max', $closing_month_max)
                ->with('evaluation', $evaluation);
            }elseif(Auth::user()->role_id == 1){
                return view('manager.AdminMonthlyDashboard', compact(['leads', 'announcements', 'lead_day', 'lead_week', 'lead_month', 'lead_all', 'products', 'omset_day', 'omset_week', 'omset_month', 'omset_all', 'budgeting_day', 'budgeting_week', 'budgeting_month', 'budgeting_all']))->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des)
                ->with('adv', $adv)->with('omset1', $omset1)->with('omset2', $omset2)->with('omset3', $omset3)->with('omset4', $omset4)->with('omset_permonth', $omset_permonth)->with('budgeting', $budgeting)
                ->with('budgeting_adv', $budgeting_adv)->with('budgeting_nonadv', $budgeting_nonadv)->with('budgeting_realization_adv', $budgeting_realization_adv)->with('budgeting_realization_nonadv', $budgeting_realization_nonadv)
                ->with('omset_jan', $omset_jan)->with('omset_feb', $omset_feb)->with('omset_mar', $omset_mar)->with('omset_apr', $omset_apr)->with('omset_may', $omset_may)->with('omset_jun', $omset_jun)
                ->with('omset_jul', $omset_jul)->with('omset_aug', $omset_aug)->with('omset_sep', $omset_sep)->with('omset_okt', $omset_okt)->with('omset_nov', $omset_nov)->with('omset_des', $omset_des)
                ->with('advertising_jan', $advertising_jan)->with('advertising_feb', $advertising_feb)->with('advertising_mar', $advertising_mar)->with('advertising_apr', $advertising_apr)->with('advertising_may', $advertising_may)->with('advertising_jun', $advertising_jun)
                ->with('advertising_jul', $advertising_jul)->with('advertising_aug', $advertising_aug)->with('advertising_sep', $advertising_sep)->with('advertising_okt', $advertising_okt)->with('advertising_nov', $advertising_nov)->with('advertising_des', $advertising_des)
                ->with('lead_month_count', $lead_month_count)->with('omset_month_count', $omset_month_count)->with('advertising_month_count', $advertising_month_count)
                ->with('lead_month_max', $lead_month_max)->with('closing_month_max', $closing_month_max)
                ->with('evaluation', $evaluation);
            }else {
                return redirect()->back();
            }
        }
    }
}
