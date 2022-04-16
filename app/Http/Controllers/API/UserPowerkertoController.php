<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserPWK;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\ProofOfPayment;

class UserPowerkertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id');

        if($request->has('role_id')){
            $data->where('role_id', $request['role_id']);
        }
        elseif($request->has('name')){
            $data->where('role_id', $request['name']);
        }
        elseif($request->has('paket_id')){
            $data->where('paket_id', $request['paket_id']);
        }

        return response()->json([UserPWK::collection($data->get()), 'Programs fetched.']);
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
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email:rfc,dns',
            'phone' => 'required|unique:users',
            'password' => 'required',
            'paket_id' => 'required',
            'image' => 'required'
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
        $user = new User();
        $user->name = $request->name;
        $user->role_id = 1;
        $user->phone = $phone;
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->status = 1;
        $user->paket_id = $validated['paket_id'];
        $user->exp = 0;
        $user->remember_token = Str::random(10);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        $user->save();

        $user_id = User::orderBy('id', 'DESC')->value('id');
        $user = User::where('id', $user_id)->update([
            'admin_id' => $user_id,
        ]);

        if($request->hasFile('image')){
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'proof-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/proof',$namaFile);
            $image = $path;
        } else {
            return Redirect::back()->with('error_code', 5)->withInput()->withErrors($validator);
        }

        $user = ProofOfPayment::insert([
            'user_id' => $user_id,
            'image' => $image,
            'created_at'   => Carbon::now()->toDateTimeString(),
            'updated_at'   => Carbon::now()->toDateTimeString(),
        ]);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new UserPWK($user)]);
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
