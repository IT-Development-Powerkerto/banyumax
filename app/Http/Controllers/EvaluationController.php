<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Evaluation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        $evaluation = Evaluation::where('admin_id', auth()->user()->admin_id)->get();
        if(auth()->user()->role_id==4){
            return view('EvaluationADV')->with('product', $products)->with('evaluation', $evaluation);
        }elseif (auth()->user()->role_id==5){
            return view('EvaluationCS')->with('product', $products)->with('evaluation', $evaluation);
        }elseif (auth()->user()->role_id==1){
            return view('Evaluation')->with('product', $products)->with('evaluation', $evaluation);
        }elseif (auth()->user()->role_id==12){
            return view('Evaluation-JA-ADV')->with('product', $products)->with('evaluation', $evaluation);
        }else {
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
        //dd($request->all());
        DB::table('evaluations')->insert([
            'admin_id'     => auth()->user()->admin_id,
            'user_id'      => auth()->user()->id,
            'product_id'   => $request->product_id,
            'date'         => $request->date,
            'time'         => $request->time,
            'resistance'   => $request->resistance,
            'solution'     => $request->solution,
            'created_at'   => Carbon::now()->format('Y-m-d'),
            'updated_at'   => Carbon::now()->format('Y-m-d'),
        ]);

        return redirect('/evaluation')->with('success','Successull! Evaluation Added');
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
