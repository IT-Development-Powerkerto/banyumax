<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Paket;
use App\Models\Lead;
use App\Models\Announcement;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Models\ProofOfPayment;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $day = Carbon::now()->format('Y-m-d');
        $user = User::where('role_id', 1)->get();
        $count_flexible = User::where('role_id', 1)->where('paket_id', 2)->value('admin_id');
        $paket = Paket::all();
        $lead = Lead::whereDate('created_at', $day)->get();
        $announcement = Announcement::all();
        $paket = Paket::all();
        $all_lead = Lead::where('admin_id', $count_flexible);
        $user_expired = User::where('role_id', 1)->value('expired_at');
        if($day >= $user_expired){
            DB::table('users')->where('expired_at', $day)->update([
                'exp' => 0,
                'expired_at' => $day,
            ]);
        }
        if (auth()->user()->admin_id == 1){
            return view('superadmin.SuperAdmin')->with('user', $user)->with('paket', $paket)->with('all_lead', $all_lead)->with('leads', $lead)->with('announcements', $announcement);
        }else{
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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users',
            'password' => 'required'
        ]);

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
        $user->paket_id = $request->paket;
        $user->exp = 0;
        $user->remember_token = Str::random(10);
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();
        if($request->hasFile('image')){
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            $path = $request->image->move('public/assets/img/user',$namaFile);
            $user->image = $path;
        } else {
            $user->image = null;
        }
        $user->save();
        $user_id = User::orderBy('id', 'DESC')->value('id');
        DB::table('users')->where('id', $user_id)->update([
            'admin_id' => $user_id,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $paket = Paket::all();
        $proof = ProofOfPayment::where('user_id', $id)->value('image');
        return view('DetailAdmin',['admin' => $user])->with('paket', $paket)->with('proof', $proof);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $paket = Paket::all();
        return view('EditingAdmin',['admin' => $user])->with('paket', $paket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        DB::table('users')->where('id', $user)->update([
            'name'           => $request->name,
            'email'          => $request->email,
            'username'       => $request->username,
            'paket_id'       => $request->paket_id,
        ]);

        DB::table('users')->where('admin_id', $user)->update([
            'paket_id'       => $request->paket_id,
        ]);

        return redirect('/superadmin')->with('success','Successfull! Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function updateAktive($user){
        DB::table('users')->where('admin_id', $user)->update([
            'exp' => 1,
            'expired_at' => date('Y-m-d', strtotime('+1 month')),
        ]);

        // return redirect('/superadmin');
        $email = DB::table('users')->where('admin_id', $user)->value('email');
        return redirect()->route('activation', ['email' => $email]);
    }

    public function updateNonAktive($user){
        $day = Carbon::now()->format('Y-m-d');
        DB::table('users')->where('admin_id', $user)->update([
            'exp' => 0,
            'expired_at' => $day,
        ]);

        return redirect('/superadmin');
    }
}
