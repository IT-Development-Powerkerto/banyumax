<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Reimbursement;

class ReimbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 1){
            $reimbursement = Reimbursement::where('admin_id', auth()->user()->admin_id)->get();
            return view('budgeting.Reimbursement')->with('reimbursement', $reimbursement);
        }
        else{
            $reimbursement = Reimbursement::where('admin_id', auth()->user()->admin_id)->where('user_id', auth()->user()->id)->get();
            return view('budgeting.ReimbursementCS')->with('reimbursement', $reimbursement);
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
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'attachment-'.time().".".$extFile;
            $path = $request->image->move('public/assets/attachment',$namaFile);
            $attachment = $path;
        }

        if(substr(trim($request->phone), 0, 1)=='0'){
            $phone = '62'.substr(trim($request->phone), 1);
        } else{
            $phone = $request->phone;
        }

        DB::table('reimbursements')->insert([
            'admin_id'     => auth()->user()->admin_id,
            'user_id'      => auth()->user()->id,
            'reason'       => $request->reason,
            'phone'        => $phone,
            'nominal'      => $request->nominal,
            'attachment'   => $attachment,
            'status'       => 2,
            'created_at'   => Carbon::now()->toDateTimeString(),
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/dashboard')->with('success','Successull! Product Added');
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
}
