<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Announcement;
use App\Models\Campaign;
// use App\Models\Client;
use App\Models\CRM;
use App\Models\Role;
use App\Models\Icon;
use App\Models\Lead;
use App\Models\Operator;
use App\Models\Product;
use App\Models\Inputer;
use App\Models\Budgeting;
use App\Models\BudgetingRealization;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereDate('created_at', $day)->count();

        //lead this day
        $lead_day_count = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->count();
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
        $closing_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $closing_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $closing_we = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $closing_th = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $closing_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $closing_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $closing_su = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();
        $closing_max = max($closing_mo->count(), $closing_tu->count(), $closing_we->count(), $closing_th->count(), $closing_fr->count(), $closing_sa->count(), $closing_su->count());

        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        //omset this day
        $omset_day_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        //count omset every month
        $omset_mo = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $omset_tu = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $omset_we = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $omset_th = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $omset_fr = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $omset_sa = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $omset_su = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //advertising cost this day
        $advertising_day_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereDate('updated_at', $day)->sum('requirement');
        //count advertising cost every month
        $advertising_mo = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->sum('requirement');
        $advertising_tu = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->sum('requirement');
        $advertising_we = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->sum('requirement');
        $advertising_th = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->sum('requirement');
        $advertising_fr = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->sum('requirement');
        $advertising_sa = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->sum('requirement');
        $advertising_su = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('quantity');

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
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
            ->whereDate('l.created_at', $day)
            ->whereNull('l.deleted_at')
            ->orderByDesc('l.id')
            ->get();

            $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
            $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 6)->whereDate('created_at', $day)->get();
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Lead::where('admin_id', auth()->user()->admin_id)->select('client_name', 'client_whatsapp')->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            // dd($total_lead);
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5 || $x->role_id == 13){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }
            else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else if($x->role_id == 12){
                return redirect(route('JA-adv.index'));
            }
            else{
                return view('dashboard', compact('users', 'lead_max', 'closing_max'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('all_leads', $all_leads)->with('all_spam', $all_spam)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
                ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
                ->with('omset', $omset)->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
                ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
                ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count);
                // ->with('countdown', $countdown);
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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ]);
        if($validator->fails()){
            // return back()->with('error','Error! User not been Added')->withInput()->withErrors($validator);
            return Redirect::back()->with('error_code', 5)->withInput()->withErrors($validator);
        }
        $validated = $validator->validate();
        if(substr(trim($validated['phone']), 0, 1)=='0'){
            $phone = '62'.substr(trim($validated['phone']), 1);
        } else{
            $phone = $validated['phone'];
        }

        if($request->role_id == 1){
            $user = new User();
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->phone = $phone;
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->status = 1;
            $user->paket_id = auth()->user()->paket_id;
            $user->exp = auth()->user()->exp;
            $user->remember_token = Str::random(10);
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->expired_at = auth()->user()->expired_at;
            if($request->hasFile('image')){
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'user-'.time().".".$extFile;
                $path = $request->image->move('public/assets/img',$namaFile);
                $user->image = $path;
            } else {
                $user->image = null;
            }
            $user->save();
            $user_id = User::orderBy('id', 'DESC')->value('id');
            DB::table('users')->where('id', $user_id)->update([
                'admin_id' => $user_id,
            ]);
        } else{
            $user = new User();
            $user->admin_id = auth()->user()->id;
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->phone = $phone;
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']);
            $user->status = 1;
            $user->paket_id = auth()->user()->paket_id;
            $user->exp = auth()->user()->exp;
            $user->remember_token = Str::random(10);
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->expired_at = auth()->user()->expired_at;
            if($request->hasFile('image')){
                $extFile = $request->image->getClientOriginalExtension();
                $namaFile = 'user-'.time().".".$extFile;
                $path = $request->image->move('public/assets/img',$namaFile);
                $user->image = $path;
            } else {
                $user->image = null;
            }
            $user->save();
        }

        return redirect('/dashboard')->with('success','Successull! User Added');
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
    public function edit($user)
    {
        $result = User::findOrFail($user)->where('admin_id', auth()->user()->admin_id);
        return view('dashboard.edit',['user' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        File::delete($user->image);
        $user->delete();
        return redirect('/dashboard')->with('success','Successull! User Deleted');
    }

    public function adv(Request $request){
        $day = Carbon::now()->format('Y-m-d');
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereDate('created_at', $day)->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereDate('created_at', $day)->count();

        //lead this day
        $lead_day_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereDate('created_at', $day)->count();
        //count lead every day
        $lead_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $lead_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $lead_we = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $lead_th = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $lead_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $lead_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $lead_su = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_max = max($lead_mo->count(), $lead_tu->count(), $lead_we->count(), $lead_th->count(), $lead_fr->count(), $lead_sa->count(), $lead_su->count());

        //count lead closing every month
        $closing_mo = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $closing_tu = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $closing_we = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $closing_th = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $closing_fr = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $closing_sa = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $closing_su = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();
        $closing_max = max($closing_mo->count(), $closing_tu->count(), $closing_we->count(), $closing_th->count(), $closing_fr->count(), $closing_sa->count(), $closing_su->count());

        //omset this day
        $omset_day_count = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereDate('created_at', $day)->sum('total_price');
        //count omset every month
        $omset_mo = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->get();
        $omset_tu = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->get();
        $omset_we = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->get();
        $omset_th = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->get();
        $omset_fr = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->get();
        $omset_sa = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->get();
        $omset_su = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->get();

        //advertising cost this day
        $advertising_day_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereDate('updated_at', $day)->sum('requirement');
        //count advertising cost every month
        $advertising_mo = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()->subDay(6),
        ])->sum('requirement');
        $advertising_tu = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(1),
            Carbon::now()->endOfWeek()->subDay(5),
        ])->sum('requirement');
        $advertising_we = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(2),
            Carbon::now()->endOfWeek()->subDay(4),
        ])->sum('requirement');
        $advertising_th = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(3),
            Carbon::now()->endOfWeek()->subDay(3),
        ])->sum('requirement');
        $advertising_fr = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(4),
            Carbon::now()->endOfWeek()->subDay(2),
        ])->sum('requirement');
        $advertising_sa = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(5),
            Carbon::now()->endOfWeek()->subDay(1),
        ])->sum('requirement');
        $advertising_su = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek()->addDay(6),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereDate('created_at', $day)->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day);
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            if($x->role_id == 4){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
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
                    ->where('l.advertiser', $x->name)
                    ->whereNull('l.deleted_at')
                    ->whereDate('l.created_at', $day)
                    ->orderByDesc('l.id')
                    ->get();
                $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereDate('created_at', $day)->get();
                $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 6)->whereDate('created_at', $day)->get();
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('adv',['role'=>$roles])->with('day', $day)->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)->with('omset', $omset)
                ->with('products', $products)->with('all_leads', $all_leads)->with('all_spam', $all_spam)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_su', $lead_su)->with('lead_mo', $lead_mo)->with('lead_tu', $lead_tu)->with('lead_we', $lead_we)->with('lead_th', $lead_th)->with('lead_fr', $lead_fr)->with('lead_sa', $lead_sa)
                ->with('closing_su', $closing_su)->with('closing_mo', $closing_mo)->with('closing_tu', $closing_tu)->with('closing_we', $closing_we)->with('closing_th', $closing_th)->with('closing_fr', $closing_fr)->with('closing_sa', $closing_sa)
                ->with('omset_su', $omset_su)->with('omset_mo', $omset_mo)->with('omset_tu', $omset_tu)->with('omset_we', $omset_we)->with('omset_th', $omset_th)->with('omset_fr', $omset_fr)->with('omset_sa', $omset_sa)
                ->with('advertising_su', $advertising_su)->with('advertising_mo', $advertising_mo)->with('advertising_tu', $advertising_tu)->with('advertising_we', $advertising_we)->with('advertising_th', $advertising_th)->with('advertising_fr', $advertising_fr)->with('advertising_sa', $advertising_sa)
                ->with('lead_day_count', $lead_day_count)->with('omset_day_count', $omset_day_count)->with('advertising_day_count', $advertising_day_count)->with('lead_max', $lead_max)->with('closing_max', $closing_max);
            }else{
                return Redirect::back();
            }
        }
    }

    public function WeeklyADV(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();

        //lead this week
        $lead_week_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        //count lead every wonth
        $lead_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $lead_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $lead_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $lead_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_week_max = max($lead_week1->count(), $lead_week2->count(), $lead_week3->count(), $lead_week4->count());

        //count lead closing every week
        $closing_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $closing_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $closing_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $closing_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $closing_week_max = max($closing_week1->count(), $closing_week2->count(), $closing_week3->count(), $closing_week4->count());

        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        //omset this week
        $omset_week_count = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        //count omset every month
        $omset_week1 = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset_week2 = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset_week3 = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset_week4 = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();

        //advertising cost this week
        $advertising_week_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        //count advertising cost every month
        $advertising_week1 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->sum('requirement');
        $advertising_week2 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->sum('requirement');
        $advertising_week3 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->sum('requirement');
        $advertising_week4 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day);
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            if($x->role_id == 4){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
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
                    ->where('l.advertiser', $x->name)
                    ->whereNull('l.deleted_at')
                    ->whereDate('l.created_at', $day)
                    ->orderByDesc('l.id')
                    ->get();
                $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereDate('created_at', $day)->get();
                $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 6)->whereDate('created_at', $day)->get();
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('Weeklyadv',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('all_spam', $all_spam)->with('all_leads', $all_leads)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
                ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
                ->with('omset', $omset)->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
                ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
                ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
                ->with('closing_week_max', $closing_week_max)->with('lead_week_max', $lead_week_max)->with('day', $day);
            }else{
                return Redirect::back();
            }
        }
    }
    public function MonthlyADV(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->count();

        //lead this mount
        $lead_month_count = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        //count lead every month
        $lead_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $lead_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $lead_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $lead_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $lead_may = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $lead_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $lead_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $lead_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $lead_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $lead_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $lead_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $lead_des = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();
        $lead_month_max = max($lead_jan->count(), $lead_feb->count(), $lead_mar->count(), $lead_apr->count(), $lead_may->count(), $lead_jun->count(), $lead_jul->count(), $lead_aug->count(), $lead_sep->count(), $lead_okt->count(), $lead_nov->count(), $lead_des->count());

        //count lead closing every month
        $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();
        $closing_month_max = max($closing_jan->count(), $closing_feb->count(), $closing_mar->count(), $closing_apr->count(), $closing_may->count(), $closing_jun->count(), $closing_jul->count(), $closing_aug->count(), $closing_sep->count(), $closing_okt->count(), $closing_nov->count(), $closing_des->count());

        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        //omset this month
        $omset_month_count = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        //count omset every month
        $omset_jan = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $omset_feb = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $omset_mar = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $omset_apr = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $omset_may = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $omset_jun = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $omset_jul = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $omset_aug = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $omset_sep = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $omset_okt = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $omset_nov = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $omset_des = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();

        //advertising this month
        $advertising_month_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        //count advertising every month
        $advertising_jan = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->sum('requirement');
        $advertising_feb = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->sum('requirement');
        $advertising_mar = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->sum('requirement');
        $advertising_apr = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->sum('requirement');
        $advertising_may = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->sum('requirement');
        $advertising_jun = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->sum('requirement');
        $advertising_jul = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->sum('requirement');
        $advertising_aug = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->sum('requirement');
        $advertising_sep = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->sum('requirement');
        $advertising_okt = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->sum('requirement');
        $advertising_nov = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->sum('requirement');
        $advertising_des = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('user_name', auth()->user()->name)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->where('adv_name', auth()->user()->name)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');

        $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day);
        $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();
        $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->get();
        $lead_all = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->sum('total_price');
        $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        $omset_all = Inputer::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::all();
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            if($x->role_id == 4){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
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
                    ->where('l.advertiser', $x->name)
                    ->whereNull('l.deleted_at')
                    ->where('l.created_at', $day)
                    ->orderByDesc('l.id')
                    ->get();
                $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->whereDate('created_at', $day)->get();
                $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('advertiser', auth()->user()->name)->where('status_id', 6)->whereDate('created_at', $day)->get();
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('Monthlyadv',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('all_spam', $all_spam)->with('all_leads', $all_leads)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des)
                ->with('omset', $omset)->with('omset_jan', $omset_jan)->with('omset_feb', $omset_feb)->with('omset_mar', $omset_mar)->with('omset_apr', $omset_apr)->with('omset_may', $omset_may)->with('omset_jun', $omset_jun)
                ->with('omset_jul', $omset_jul)->with('omset_aug', $omset_aug)->with('omset_sep', $omset_sep)->with('omset_okt', $omset_okt)->with('omset_nov', $omset_nov)->with('omset_des', $omset_des)
                ->with('advertising_jan', $advertising_jan)->with('advertising_feb', $advertising_feb)->with('advertising_mar', $advertising_mar)->with('advertising_apr', $advertising_apr)->with('advertising_may', $advertising_may)->with('advertising_jun', $advertising_jun)
                ->with('advertising_jul', $advertising_jul)->with('advertising_aug', $advertising_aug)->with('advertising_sep', $advertising_sep)->with('advertising_okt', $advertising_okt)->with('advertising_nov', $advertising_nov)->with('advertising_des', $advertising_des)
                ->with('lead_month_count', $lead_month_count)->with('omset_month_count', $omset_month_count)->with('advertising_month_count', $advertising_month_count)->with('lead_month_max', $lead_month_max)->with('closing_month_max', $closing_month_max)->with('day',$day);
            }else{
                return Redirect::back();
            }
        }
    }

    public function cs(Request $request){
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
            if($request){
                $users = User::where('admin_id', auth()->user()->admin_id)->where('name', 'like', '%'.$request->search.'%')->get();
            }else{
                $users = User::where('admin_id', auth()->user()->admin_id)->get();
            }
            $x = auth()->user();
            $operator = Operator::where('user_id', $x->id)->value('user_id');
            if($x->role_id == 5 || $x->role_id == 13){
                $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
                $roles = Role::all();
                $icons = Icon::all();
                $products = Product::where('admin_id', auth()->user()->admin_id)->get();
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
                    ->where('l.user_id', $operator)
                    ->whereNull('l.deleted_at')
                    ->whereDate('l.created_at', $day)
                    ->orderByDesc('l.id')
                    ->get();
                $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
                $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 6)->whereDate('created_at', $day)->get();
                $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
                $my_campaigns = DB::table('operators as o')->where('o.user_id', auth()->user()->id)->join('campaigns as c', 'o.campaign_id', 'c.id' )->whereNull(['c.deleted_at', 'o.deleted_at'])->get();
                // dd($my_campaigns);
                $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
                return view('cs',['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('all_leads', $all_leads)->with('all_spam', $all_spam)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('day', $day)
                ->with('my_campaigns', $my_campaigns);
            }else{
                return Redirect::back();
            }
        }
    }

    public function ld(Request $request) {
        if(auth()->user()->role_id == 1){
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
        }else{
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->get();
        }
        $client = Lead::where('admin_id', auth()->user()->admin_id)->select('client_name', 'client_whatsapp')->get();
        $operator = Operator::where('admin_id', auth()->user()->admin_id)->get();
        // $lead = DB::table('leads as l')
        //     ->join('operators as o', 'l.operator_id', '=', 'o.id')
        //     ->join('products as p', 'l.product_id', '=', 'p.id' )
        //     ->join('statuses as s', 'l.status_id', '=', 's.id')
        //     ->join('clients as c', 'l.client_id', '=', 'c.id')
        //     ->join('campaigns as cp', 'l.campaign_id', '=', 'cp.id')
        //     ->select('l.id as id', 'advertiser', 'o.name as operator_name', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price', 'l.created_at as created_at', 'l.updated_at as updated_at', 'l.status_id as status_id', 's.name as status', 'c.name as client_name', 'c.whatsapp as client_wa', 'c.created_at as client_created_at', 'c.updated_at as client_updated_at', 'cp.cs_to_customer as cs_to_customer', 'cp.id as campaign_id')
        //     ->where('c.updated_at', $day);
        //$lead = Lead::where('updated_at', $day)->orderByDesc('id')->get();
        if($request->date_filter){
            $day = Carbon::parse($request->date_filter)->format('Y-m-d');
        } else {
            $day = Carbon::now()->format('Y-m-d');
        }
        $lead = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->orderByDesc('id')->get();
        // $leads = Lead::where('admin_id', auth()->user()->admin_id)->get();
        $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
        $x = auth()->user();
        if($x->role_id == 1){
            return view('DetailLead')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead)->with('leads', $leads)->with('announcements', $announcements);
        }elseif($x->role_id == 4){
            return view('DetailLeadADV')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead)->with('announcements', $announcements)->with('day', $day);
        }elseif($x->role_id == 12){
            return view('DetailLeadJA-ADV')->with('campaign', $campaigns)->with('client', $client)->with('operator', $operator)->with('lead', $lead)->with('leads', $leads)->with('announcements', $announcements);
        }
    }

    public function WeeklyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->count();

        //lead this week
        $lead_week_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get();

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
        $closing_week1 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $closing_week2 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $closing_week3 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $closing_week4 = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();
        $closing_week_max = max($closing_week1->count(), $closing_week2->count(), $closing_week3->count(), $closing_week4->count());

        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        //omset this week
        $omset_week_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('total_price');
        //count omset every week
        $omset_week1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->get();
        $omset_week2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->get();
        $omset_week3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->get();
        $omset_week4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->get();

        //advertising cost this week
        $advertising_week_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('requirement');
        //count advertising cost every week
        $advertising_week1 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()->subWeek(3),
        ])->sum('requirement');
        $advertising_week2 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(1),
            Carbon::now()->endOfMonth()->subWeek(2),
        ])->sum('requirement');
        $advertising_week3 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(2),
            Carbon::now()->endOfMonth()->subWeek(1),
        ])->sum('requirement');
        $advertising_week4 = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth()->addWeek(3),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->sum('quantity');

        $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
        $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 6)->whereDate('created_at', $day)->get();

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
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
            ->whereNull('l.deleted_at')
            ->whereDate('l.created_at', $day)
            ->orderByDesc('l.id')
            ->get();
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Lead::where('admin_id', auth()->user()->admin_id)->select('client_whatsapp', 'client_name')->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5 || $x->role_id == 13){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else{
                return view('WeeklyDashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('all_leads', $all_leads)->with('all_spam', $all_spam)->with('leads', $leads)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_week1', $lead_week1)->with('lead_week2', $lead_week2)->with('lead_week3', $lead_week3)->with('lead_week4', $lead_week4)
                ->with('closing_week1', $closing_week1)->with('closing_week2', $closing_week2)->with('closing_week3', $closing_week3)->with('closing_week4', $closing_week4)
                ->with('omset', $omset)->with('omset_week1', $omset_week1)->with('omset_week2', $omset_week2)->with('omset_week3', $omset_week3)->with('omset_week4', $omset_week4)
                ->with('advertising_week1', $advertising_week1)->with('advertising_week2', $advertising_week2)->with('advertising_week3', $advertising_week3)->with('advertising_week4', $advertising_week4)
                ->with('lead_week_count', $lead_week_count)->with('omset_week_count', $omset_week_count)->with('advertising_week_count', $advertising_week_count)
                ->with('closing_week_max', $closing_week_max)->with('lead_week_max', $lead_week_max);
                // ->with('countdown', $countdown);
            }
        }
    }
    public function MonthlyDashboard(Request $request) {
        $day = Carbon::now()->format('Y-m-d');
        $user_expired = auth()->user()->expired_at;
        $user_count = User::where('admin_id', auth()->user()->admin_id)->count();

        $lead_count = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();
        $closing_count = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
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
        $closing_jan = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $closing_feb = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $closing_mar = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $closing_apr = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $closing_may = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $closing_jun = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $closing_jul = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $closing_aug = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $closing_sep = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $closing_okt = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $closing_nov = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $closing_des = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 5)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();
        $closing_month_max = max($closing_jan->count(), $closing_feb->count(), $closing_mar->count(), $closing_apr->count(), $closing_may->count(), $closing_jun->count(), $closing_jul->count(), $closing_aug->count(), $closing_sep->count(), $closing_okt->count(), $closing_nov->count(), $closing_des->count());

        $omset = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        //omset this month
        $omset_month_count = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('total_price');
        //count omset every month
        $omset_jan = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->get();
        $omset_feb = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->get();
        $omset_mar = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->get();
        $omset_apr = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->get();
        $omset_may = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->get();
        $omset_jun = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->get();
        $omset_jul = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->get();
        $omset_aug = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->get();
        $omset_sep = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->get();
        $omset_okt = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->get();
        $omset_nov = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->get();
        $omset_des = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->get();

        //advertising this month
        $advertising_month_count = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('requirement');
        //count advertising every month
        $advertising_jan = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()->subMonth(11),
        ])->sum('requirement');
        $advertising_feb = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(1),
            Carbon::now()->endOfYear()->subMonth(10),
        ])->sum('requirement');
        $advertising_mar = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(2),
            Carbon::now()->endOfYear()->subMonth(9),
        ])->sum('requirement');
        $advertising_apr = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(3),
            Carbon::now()->endOfYear()->subMonth(8),
        ])->sum('requirement');
        $advertising_may = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(4),
            Carbon::now()->endOfYear()->subMonth(7),
        ])->sum('requirement');
        $advertising_jun = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(5),
            Carbon::now()->endOfYear()->subMonth(6),
        ])->sum('requirement');
        $advertising_jul = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(6),
            Carbon::now()->endOfYear()->subMonth(5),
        ])->sum('requirement');
        $advertising_aug = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(7),
            Carbon::now()->endOfYear()->subMonth(4),
        ])->sum('requirement');
        $advertising_sep = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(8),
            Carbon::now()->endOfYear()->subMonth(3),
        ])->sum('requirement');
        $advertising_okt = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(9),
            Carbon::now()->endOfYear()->subMonth(2),
        ])->sum('requirement');
        $advertising_nov = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(10),
            Carbon::now()->endOfYear()->subMonth(1),
        ])->sum('requirement');
        $advertising_des = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->whereBetween('updated_at', [
            Carbon::now()->startOfYear()->addMonth(11),
            Carbon::now()->endOfYear(),
        ])->sum('requirement');

        $quantity = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->sum('quantity');

        $all_leads = Lead::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
        $all_spam  = Lead::where('admin_id', auth()->user()->admin_id)->where('status_id', 6)->whereDate('created_at', $day)->get();

        if($day >= $user_expired){
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with('error' ,'Your subscription has expired');
        }
        else{
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
            ->whereNull('l.deleted_at')
            ->whereDate('l.created_at', $day)
            ->orderByDesc('l.id')
            ->get();
            //dd($leads);
            $users = User::where('admin_id', auth()->user()->admin_id)->get();
            $announcements = Announcement::where('admin_id', auth()->user()->admin_id)->get();
            if (auth()->user()->admin_id == 1){
                $roles = Role::all();
            }
            else {
                $roles = Role::where('id', '!=', 1)->get();
            }

            $icons = Icon::all();
            $products = Product::where('admin_id', auth()->user()->admin_id)->get();


            $client = Lead::where('admin_id', auth()->user()->admin_id)->select('client_name', 'client_whatsapp')->get();
            $campaigns = Campaign::where('admin_id', auth()->user()->admin_id)->get();
            $total_lead = DB::table('products')->where('admin_id', auth()->user()->admin_id)->pluck('lead');
            $inputer = Inputer::where('admin_id', auth()->user()->admin_id);
            // dd($leads);

            // $now = DB::table('leads')->value('created_at');
            // $countdown = Countdown::from($now)
            //      ->to($now->copy()->addYears(5))
            //      ->get()->toHuman('{days} days, {hours} hours and {minutes} minutes');

            $x = auth()->user();
            if($x->admin_id == 1){
                return redirect(route('superadmin.index'));
            }
            else if($x->role_id == 2){
                return redirect(route('ceo'));
            }
            else if($x->role_id == 3){
                return redirect(route('manager'));
            }
            else if($x->role_id == 4){
                return redirect(route('advDashboard'));
            }
            else if($x->role_id == 5 || $x->role_id == 13){
                return redirect(route('csDashboard'));
            }
            else if($x->role_id == 9){
                return redirect(route('finance'));
            }
            else if($x->role_id == 10){
                return redirect(route('inputer'));
            }else if($x->role_id == 11){
                return redirect(route('HumanResource.index'));
            }
            else{
                return view('MonthlyDashboard', compact('users'),['role'=>$roles])->with('users',$users)->with('announcements',$announcements)->with('icon',$icons)
                ->with('products', $products)->with('leads', $leads)->with('all_leads', $all_leads)->with('all_spam', $all_spam)->with('total_lead', $total_lead)->with('campaigns', $campaigns)->with('client', $client)->with('day', $day)
                ->with('inputer', $inputer)->with('lead_count', $lead_count)->with('closing_count', $closing_count)->with('quantity', $quantity)->with('user_count', $user_count)
                ->with('lead_jan', $lead_jan)->with('lead_feb', $lead_feb)->with('lead_mar', $lead_mar)->with('lead_apr', $lead_apr)->with('lead_may', $lead_may)->with('lead_jun', $lead_jun)
                ->with('lead_jul', $lead_jul)->with('lead_aug', $lead_aug)->with('lead_sep', $lead_sep)->with('lead_okt', $lead_okt)->with('lead_nov', $lead_nov)->with('lead_des', $lead_des)
                ->with('closing_jan', $closing_jan)->with('closing_feb', $closing_feb)->with('closing_mar', $closing_mar)->with('closing_apr', $closing_apr)->with('closing_may', $closing_may)->with('closing_jun', $closing_jun)
                ->with('closing_jul', $closing_jul)->with('closing_aug', $closing_aug)->with('closing_sep', $closing_sep)->with('closing_okt', $closing_okt)->with('closing_nov', $closing_nov)->with('closing_des', $closing_des)
                ->with('omset', $omset)->with('omset_jan', $omset_jan)->with('omset_feb', $omset_feb)->with('omset_mar', $omset_mar)->with('omset_apr', $omset_apr)->with('omset_may', $omset_may)->with('omset_jun', $omset_jun)
                ->with('omset_jul', $omset_jul)->with('omset_aug', $omset_aug)->with('omset_sep', $omset_sep)->with('omset_okt', $omset_okt)->with('omset_nov', $omset_nov)->with('omset_des', $omset_des)
                ->with('advertising_jan', $advertising_jan)->with('advertising_feb', $advertising_feb)->with('advertising_mar', $advertising_mar)->with('advertising_apr', $advertising_apr)->with('advertising_may', $advertising_may)->with('advertising_jun', $advertising_jun)
                ->with('advertising_jul', $advertising_jul)->with('advertising_aug', $advertising_aug)->with('advertising_sep', $advertising_sep)->with('advertising_okt', $advertising_okt)->with('advertising_nov', $advertising_nov)->with('advertising_des', $advertising_des)
                ->with('lead_month_count', $lead_month_count)->with('omset_month_count', $omset_month_count)->with('advertising_month_count', $advertising_month_count)
                ->with('lead_month_max', $lead_month_max)->with('closing_month_max', $closing_month_max);
                // ->with('countdown', $countdown);
            }
        }
    }

    public function Evaluation() {
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        if(auth()->user()->role_id==4){
            return view('evaluationADV')->with('product', $products);
        }elseif (auth()->user()->role_id==5 || auth()->user()->role_id==13){
            return view('evaluationCS')->with('product', $products);
        }elseif (auth()->user()->role_id==1){
            return view('evaluation')->with('product', $products);
        }else {
            return redirect()->back();
        }
    }

    public function getProduct($campaign_id){
        $product_id = Campaign::where('id', $campaign_id)->value('product_id');
        $product = Product::where('id', $product_id)->get();

        return response()->json($product, 200);
    }
}
