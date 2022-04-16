<?php

namespace App\Http\Controllers;

use App\Models\BudgetingRealization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BudgetingRealizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgeting_realization = BudgetingRealization::where('admin_id', auth()->user()->admin_id)->get();
        if(auth()->user()->role_id==4){
            return view('budgeting.BudgetingRelADV')->with('budgeting_realization', $budgeting_realization);
        }elseif (auth()->user()->role_id==12){
            return view('budgeting.BudgetingRel-JA-ADV')->with('budgeting_realization', $budgeting_realization);
        }elseif (auth()->user()->role_id==5){
            return view('budgeting.BudgetingRelCS')->with('budgeting_realization', $budgeting_realization);
        }elseif (auth()->user()->role_id==10){
            return view('budgeting.BudgetingRelInputer')->with('budgeting_realization', $budgeting_realization);
        }elseif (auth()->user()->role_id==9){
            return view('budgeting.BudgetingRelFinance')->with('budgeting_realization', $budgeting_realization);
        }else{
            return view('budgeting.BudgetingRel')->with('budgeting_realization', $budgeting_realization);
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
        if($request->hasFile('attachment'))
        {
            $extFile = $request->attachment->getClientOriginalExtension();
            $namaFile = 'budgeting_realization-'.time().".".$extFile;
            $request->attachment->move('public/assets/file/budgeting_realization',$namaFile);
            $attachment = $namaFile;
        }else{
            $attachment = null;
        }
        DB::table('budgeting_realizations')->insert([
            'admin_id'     => auth()->user()->admin_id,
            'user_id'      => auth()->user()->id,
            'user_name'    => auth()->user()->name,
            'role_id'      => auth()->user()->role_id,
            'item_name'    => $request->item,
            'requirement'  => $request->requirement,
            'attachment'   => $attachment,
            'description'  => $request->description,
            'created_at'   => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'   => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return Redirect::back();
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

    public function download($id)
    {
        $budgeting_realization = BudgetingRealization::where('id', $id)->firstOrFail();
        $pathToFile = public_path().'\public\assets\file\budgeting_realization/' . $budgeting_realization->attachment;
        return response()->download($pathToFile);
    }
}
