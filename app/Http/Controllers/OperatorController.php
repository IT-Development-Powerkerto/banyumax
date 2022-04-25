<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Lead;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Validator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $day = Carbon::now()->format('Y-m-d');
        $operators = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
        $lead_count = DB::table('leads')
            ->join('operators', 'leads.operator_id', '=', 'operators.id')
            ->where('leads.admin_id', auth()->user()->admin_id)
            ->get();
        $lead_day_count = DB::table('leads')
        ->join('operators', 'leads.operator_id', '=', 'operators.id')
        ->where('leads.admin_id', auth()->user()->admin_id)
        ->whereDate('leads.created_at', $day)
        ->get();
        $campaign_count = Operator::where('admin_id', auth()->user()->admin_id)->get();
        $campaign_id = Campaign::where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->get();
        $operatorCampaigns = Operator::where('admin_id', auth()->user()->admin_id)->get();
        $x = auth()->user();
        if($x->role_id == 4){
            return view('operatorADV', ['operators'=>$operators])->with('lead_count', $lead_count)->with('campaign_count', $campaign_count)->with('operatorCampaigns', $operatorCampaigns)->with('campaign_id', $campaign_id)->with('lead_day_count', $lead_day_count);
        }
        if($x->role_id == 12){
            return view('operator-JA-ADV', ['operators'=>$operators])->with('lead_count', $lead_count)->with('campaign_count', $campaign_count)->with('operatorCampaigns', $operatorCampaigns)->with('lead_day_count', $lead_day_count);
        }
        if($x->role_id == 5){
            return view('operatorCS', ['operators'=>$operators])->with('lead_count', $lead_count)->with('campaign_count', $campaign_count)->with('operatorCampaigns', $operatorCampaigns)->with('lead_day_count', $lead_day_count);
        }
        return view('operator', ['operators'=>$operators])->with('lead_count', $lead_count)->with('campaign_count', $campaign_count)->with('operatorCampaigns', $operatorCampaigns)->with('lead_day_count', $lead_day_count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CreateOperator');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // ddd($request->all());
        // $rules = [];
        // foreach($request->input('user_id') as $key => $value) {
        //     $rules["user_id.{$key}"] = 'required';
        // }
        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->passes()) {
        //     foreach($request->input('user_id') as $key => $value) {
        //         Operator::create(['campaign_id'=>$request->campaign_id,'user_id'=>$value]);
        //     }
        //     return redirect('campaign');
        // }
        // return response()->json(['error'=>$validator->errors()->all()]);

        $user_id = collect($request->user_id);
        // dd($user);
        foreach ($user_id as $user_id){
            $name = User::where('admin_id', auth()->user()->admin_id)->where('id', $user_id)->value('name');
            $operatorExists = Operator::where('admin_id', auth()->user()->admin_id)->where('campaign_id', $id)->where('user_id', $user_id)->exists();
            if($operatorExists){
                return redirect(url()->previous())->with('error','Error!, '.$name.' already exists');
            }
            DB::table('operators')->insert([
                'admin_id'        => auth()->user()->admin_id,
                'campaign_id'     => $id,
                'user_id'         => $user_id,
                'name'            => $name,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
        return redirect(url()->previous())->with('success','Successfull! Operator Added');
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
    public function destroy($campaign, $operator)
    {
        //DB::delete('delete from users where id = ?', [$campaign]);
        // dd($operator);
        $operator = Operator::where('id', $operator)->where('campaign_id', $campaign);
        $operator->delete();
        return redirect(url()->previous())->with('success','Successull! Operator Deleted');
    }
}
