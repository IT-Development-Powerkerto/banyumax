<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province');
        $response = json_decode($response, true);
        $provinces = $response['rajaongkir']['results'];
        $warehouses = Warehouse::where('admin_id', Auth::user()->admin_id)->get();
        $x = auth()->user();
        if($x->admin_id == 2){
            return view('warehouse.Dashboard', compact('warehouses', 'provinces'));
        }
        else if($x->role_id == 5){
            return view('warehouse.DashboardCS', compact('warehouses', 'provinces'));
        }
        else if($x->role_id == 4){
            return view('warehouse.DashboardADV', compact('warehouses', 'provinces'));
        }
        else if($x->role_id == 12){
            return view('warehouse.DashboardJA', compact('warehouses', 'provinces'));
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
        $p = explode('_', $request->province);
        $province_id = $p[0];
        $province = $p[1];
        $c = explode('_', $request->city);
        $city_id = $c[0];
        $city = $c[1];

        $s = explode('_', $request->subdistrict);
        $subdistrict_id = $s[0];
        $subdistrict = $s[1];


        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'warehouse-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/warehouse',$namaFile);
            $image = $path;
        }else{
            $image = null;
        }
        Warehouse::create([
            'admin_id' => Auth::user()->admin_id,
            'name' => $request->name,
            'initials' => $request->initials,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'address' => $request->address,
            'province_id' => $province_id,
            'province' => $province,
            'city_id' => $city_id,
            'city' => $city,
            'subdistrict_id' => $subdistrict_id,
            'subdistrict' => $subdistrict,
            'status' => $request->status
        ]);
        return redirect('warehouse')->with('success', 'Successfull! Warehouse Added');
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
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province');
        $response = json_decode($response, true);
        $provinces = $response['rajaongkir']['results'];
        $province_id = Warehouse::whereId($id)->value('province_id');
        $all_city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?&province='.$province_id);
        $all_city = json_decode($all_city, true);
        $all_city = $all_city['rajaongkir']['results'];
        $city_id = Warehouse::whereId($id)->value('city_id');
        $all_subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$city_id);
        $all_subdistrict = json_decode($all_subdistrict, true);
        $all_subdistrict = $all_subdistrict['rajaongkir']['results'];
        $warehouse = Warehouse::findOrFail($id);
        $x = auth()->user();
        if($x->admin_id == 2){
            return view('warehouse.WarehouseEdit', compact('warehouse', 'provinces', 'all_city', 'all_subdistrict'));
        }
        else if($x->role_id == 5){
            return view('warehouse.WarehouseEditCS', compact('warehouse', 'provinces', 'all_city', 'all_subdistrict'));
        }
        else if($x->role_id == 4){
            return view('warehouse.WarehouseEditADV', compact('warehouse', 'provinces', 'all_city', 'all_subdistrict'));
        }
        else if($x->role_id == 12){
            return view('warehouse.WarehouseEditJA', compact('warehouse', 'provinces', 'all_city', 'all_subdistrict'));
        }

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
        // dd($id);
        // dd($request->all());
        $p = explode('_', $request->province);
        $province_id = $p[0];
        $province = $p[1];
        $c = explode('_', $request->city);
        $city_id = $c[0];
        $city = $c[1];

        $s = explode('_', $request->subdistrict);
        $subdistrict_id = $s[0];
        $subdistrict = $s[1];
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        $warehouse = Warehouse::find($id);
        // dd($warehouse);
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'warehouse-'.time().".".$extFile;
            File::delete($warehouse->image);
            $path = $request->image->move('public/assets/img/warehouse',$namaFile);
            $image = $path;
        }
        else{
            $image = Warehouse::where('id', $id)->value('image');
        }
        Warehouse::where('id', $id)->update([
            'name' => $request->name,
            'initials' => $request->initials,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'address' => $request->address,
            'status' => $request->status,
            'province_id' => $province_id,
            'province' => $province,
            'city_id' => $city_id,
            'city' => $city,
            'subdistrict_id' => $subdistrict_id,
            'subdistrict' => $subdistrict,
        ]);
        return redirect('warehouse')->with('success', 'Successfull! Warehouse Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'ok';
        $warehouse = Warehouse::find($id);
        File::delete($warehouse->image);
        $warehouse->delete();
        return redirect()->back()->with('success','Successull! Warehouse Deleted');
    }

    public function editingwarehouse(){
        return view('warehouse/WarehouseEdit');
    }
}
