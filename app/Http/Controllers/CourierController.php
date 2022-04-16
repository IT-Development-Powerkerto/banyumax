<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couriers = Courier::all();
        return view('courier/Dashboard', compact('couriers'));
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
        $request->validate([
            'name' => 'required',
        ]);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'courier-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/courier',$namaFile);
            $image = $path;
        }else{
            $image = null;
        }
        Courier::create([
            'name' => $request->name,
            'image' => $image
        ]);
        return redirect('courier')->with('success', 'Successfull! Courier Added');
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
        $courier = Courier::findOrFail($id);
        return view('courier.CourierEdit', compact('courier'));
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
        $request->validate([
            'name' => 'required',
        ]);
        $courier = Courier::find($id);
        // dd($courier);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'couri$courier-'.time().".".$extFile;
            File::delete($courier->image);
            $path = $request->image->move('public/assets/img/couri$courier',$namaFile);
            $image = $path;
        }
        else{
            $image = Courier::where('id', $id)->value('image');
        }
        Courier::where('id', $id)->update([
            'name' => $request->name,
            'image' => $image,
        ]);
        return redirect('courier')->with('success', 'Successfull! Courier Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courier = Courier::find($id);
        File::delete($courier->image);
        $courier->delete();
        return redirect()->back()->with('success','Successull! Courier Deleted');
    }

    public function editingcourier(){
        return view('courier/CourierEdit');
    }
}
