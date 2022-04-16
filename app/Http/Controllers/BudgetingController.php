<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Inputer;
use App\Models\User;
use App\Models\Budgeting;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BudgetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1){
            $day = Carbon::now()->format('Y-m-d');
            $day_output = Carbon::now()->format('Y-M-d');
            $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('updated_at', $day)->get();
            $lead1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $lead2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $lead3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $lead4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
            $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $month = Carbon::now()->format('M');
            $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
            $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
            return view('budgeting.Budgeting')
            ->with('day_output', $day_output)
            ->with('lead_day', $lead_day)
            ->with('lead_week', $lead_week)
            ->with('lead_month', $lead_month)
            ->with('lead1', $lead1)
            ->with('lead2', $lead2)
            ->with('lead3', $lead3)
            ->with('lead4', $lead4)
            ->with('month', $month)
            ->with('omset_day', $omset_day)
            ->with('omset_week', $omset_week)
            ->with('omset_month', $omset_month)
            ->with('omset1', $omset1)
            ->with('omset2', $omset2)
            ->with('omset3', $omset3)
            ->with('omset4', $omset4)
            ->with('month', $month)
            ->with('adv', $adv)
            ->with('budgeting', $budgeting);
        }
        elseif(Auth::user()->role_id == 4) {
            $day = Carbon::now()->format('Y-m-d');
            $day_output = Carbon::now()->format('Y-M-d');
            $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('updated_at', $day)->get();
            $lead1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $lead2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $lead3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $lead4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
            $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $month = Carbon::now()->format('M');
            $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
            $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
            return view('budgeting.BudgetingADV')
            ->with('day_output', $day_output)
            ->with('lead_day', $lead_day)
            ->with('lead_week', $lead_week)
            ->with('lead_month', $lead_month)
            ->with('lead1', $lead1)
            ->with('lead2', $lead2)
            ->with('lead3', $lead3)
            ->with('lead4', $lead4)
            ->with('month', $month)
            ->with('omset_day', $omset_day)
            ->with('omset_week', $omset_week)
            ->with('omset_month', $omset_month)
            ->with('omset1', $omset1)
            ->with('omset2', $omset2)
            ->with('omset3', $omset3)
            ->with('omset4', $omset4)
            ->with('month', $month)
            ->with('adv', $adv)
            ->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==12){
            $day = Carbon::now()->format('Y-m-d');
            $day_output = Carbon::now()->format('Y-M-d');
            $lead_day = Lead::where('admin_id', auth()->user()->admin_id)->where('updated_at', $day)->get();
            $lead1 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $lead2 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $lead3 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $lead4 = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $lead_week = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $lead_month = Lead::where('admin_id', auth()->user()->admin_id)->whereBetween('updated_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $omset_day = Inputer::where('admin_id', auth()->user()->admin_id)->whereDate('created_at', $day)->get();
            $omset1 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(4),
                Carbon::now()->endOfMonth()->subWeek(3),
            ])->get();
            $omset2 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(3),
                Carbon::now()->endOfMonth()->subWeek(2),
            ])->get();
            $omset3 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subWeek(2),
                Carbon::now()->endOfMonth()->subWeek(1),
            ])->get();
            $omset4 = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->endOfMonth()->subweek(1),
                Carbon::now()->endOfMonth(),
            ])->get();
            $omset_week = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])->get();
            $omset_month = Inputer::where('admin_id', auth()->user()->admin_id)->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])->get();

            $month = Carbon::now()->format('M');
            $adv = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 4)->get();
            $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->get();
            return view('budgeting.Budgeting-JA-ADv')
            ->with('day_output', $day_output)
            ->with('lead_day', $lead_day)
            ->with('lead_week', $lead_week)
            ->with('lead_month', $lead_month)
            ->with('lead1', $lead1)
            ->with('lead2', $lead2)
            ->with('lead3', $lead3)
            ->with('lead4', $lead4)
            ->with('month', $month)
            ->with('omset_day', $omset_day)
            ->with('omset_week', $omset_week)
            ->with('omset_month', $omset_month)
            ->with('omset1', $omset1)
            ->with('omset2', $omset2)
            ->with('omset3', $omset3)
            ->with('omset4', $omset4)
            ->with('month', $month)
            ->with('adv', $adv)
            ->with('budgeting', $budgeting);
        }else {
            return Redirect::back();
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
        // dd($request->all());
        if($request->reason == null){
            $reason = 'Biaya Iklan';
        }else {
            $reason = $request->reason;
        }
        if($request->hasFile('attachment'))
        {
            $extFile = $request->attachment->getClientOriginalExtension();
            $namaFile = 'budgeting-'.time().".".$extFile;
            $request->attachment->move('public/assets/file/budgeting',$namaFile);
            $attachment = $namaFile;
        }else{
            $attachment = null;
        }
        if(auth()->user()->role_id == 4){
            DB::table('budgetings')->insert([
                'admin_id'     => auth()->user()->admin_id,
                'user_id'      => auth()->user()->id,
                'user_name'    => auth()->user()->name,
                'role_id'      => auth()->user()->role_id,
                'reason'       => $reason,
                'requirement'  => $request->requirement,
                'target'       => $request->target,
                'attachment'   => $attachment,
                'status'       => 2,
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            return Redirect::back();
        }
        else{
            DB::table('budgetings')->insert([
                'admin_id'     => auth()->user()->admin_id,
                'user_id'      => auth()->user()->id,
                'user_name'    => auth()->user()->role->name,
                'role_id'      => auth()->user()->role_id,
                'reason'       => $reason,
                'requirement'  => $request->requirement,
                'target'       => $request->target,
                'attachment'   => $attachment,
                'status'       => 2,
                'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            return Redirect::back();
        }
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

    public function ClosingCS()
    {
        return view('budgeting.Closing');
    }

    public function Finance()
    {
        $lead = Lead::all();
        $announcement = Announcement::all();
        $role = Role::all();
        $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        if(auth()->user()->role_id==9){
            return view('finance.FinanceDept')->with('role', $role)->with('budgeting', $budgeting)->with('leads', $lead)->with('announcements', $announcement);
        }elseif (auth()->user()->role_id==1){
            return view('finance.Dashboard')->with('role', $role)->with('budgeting', $budgeting)->with('leads', $lead)->with('announcements', $announcement);
        }
    }

    public function BudgetingReq()
    {
        $role = Role::all();
        $budgeting = Budgeting::where('admin_id', auth()->user()->admin_id)->where('role_id', '!=', 4)->get();
        if(auth()->user()->role_id==1){
            return view('budgeting.BudgetingReq')->with('role', $role)->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==5){
            return view('budgeting.BudgetingReqCS')->with('role', $role)->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==4){
            return view('budgeting.BudgetingReqADV')->with('role', $role)->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==12){
            return view('budgeting.BudgetingReq-JA-ADV')->with('role', $role)->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==10){
            return view('budgeting.BudgetingReqInputer')->with('role', $role)->with('budgeting', $budgeting);
        }elseif (auth()->user()->role_id==9){
            return view('budgeting.BudgetingReqFinance')->with('role', $role)->with('budgeting', $budgeting);
        }
    }

    public function downloaded($id)
    {
        $budgeting = Budgeting::where('id', $id)->firstOrFail();
        $pathToFile = public_path().'\public\assets\file\budgeting/' . $budgeting->attachment;
        return response()->download($pathToFile);
    }
}
