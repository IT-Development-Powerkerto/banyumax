<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if(auth()->user()->role_id==1){
            return view('myprofile')->with('user', $users);
        }elseif (auth()->user()->role_id==4){
            return view('myprofileADV')->with('user', $users);
        }elseif (auth()->user()->role_id==5){
            return view('myprofileCS')->with('user', $users);
        }elseif (auth()->user()->role_id==12){
            return view('myprofileJA-ADV')->with('user', $users);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $result = User::where('admin_id', auth()->user()->admin_id)->findOrFail($id);
        if(auth()->user()->role_id==1){
            return view('editing',['user' => $result])->with('roles', $roles);
        }elseif (auth()->user()->role_id==4){
            return view('editingADV',['user' => $result])->with('roles', $roles);
        }elseif (auth()->user()->role_id==5){
            return view('editingCS',['user' => $result])->with('roles', $roles);
        }elseif (auth()->user()->role_id==12){
            return view('editingJA-ADV',['user' => $result])->with('roles', $roles);
        }
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
        if($request->hasFile('image'))
        {
            $extFile = $request->image->getClientOriginalExtension();
            $namaFile = 'user-'.time().".".$extFile;
            File::delete($user->image);
            $path = $request->image->move('public/assets/img',$namaFile);
            $image = $path;
        }
        else{
            $image = DB::table('users')->where('admin_id', auth()->user()->admin_id)->where('id', $user->id)->implode('image');
            if(strlen($image) > 0){
                $image = DB::table('users')->where('admin_id', auth()->user()->admin_id)->where('id', $user->id)->implode('image');
            }else{
                $image = null;
            }
        }
        if(is_null($request->role_id)){
            $role_id = $user->role_id;
        }else{
            $role_id = $request->role_id;
        }
        if(substr(trim($request->phone), 0, 1)=='0'){
            $phone = '62'.substr(trim($request->phone), 1);
        } else{
            $phone = $request->phone;
        }
        DB::table('users')->where('admin_id', auth()->user()->admin_id)->where('id', $user->id)->update([
            'admin_id'  => auth()->user()->admin_id,
            'nickname'      => $request->nickname,
            'name'      => $request->name,
            'role_id'   => $role_id,
            'phone'     => $phone,
            'username'  => $request->username,
            'email'     => $request->email,
            // 'password'  => Hash::make($request->password),
            'image'     => $image,
            'status'    => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/dashboard')->with('success','Successull! User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        File::delete($user->image);
        return redirect('/dashboard')->with('success','Successull! User Deleted');
    }

    public function updateStatus(Request $request)
    {
        $user = User::where('admin_id', auth()->user()->admin_id)->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return redirect()->to('/dashboard');
    }

    public function select(Request $request)
    {
        $roles = [];

        if ($request->has('q')) {
            $search = $request->q;
            $roles = Role::select("id", "name")
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $roles = Role::limit(10)->get();
        }
        return response()->json($roles);
    }
    public function changePassword(Request $request,User $user)
    {
        // dd(auth()->user()->password);
        $result =  Hash::check($request->cpassword, auth()->user()->password);

        if($result){
            // $user->name = auth()->user()->name;
            // dd($user->id);
            DB::table('users')->where('admin_id', auth()->user()->admin_id)->where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->password),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
            // $user->password = Hash::make($request->password);
            // $user->update();
            // dd($request->password);
            return redirect('/myprofile')->with('success','Successull! Password has been changed');
            // Auth::logout();
            // return route('/logout');
        }else{
            return redirect('/myprofile')->with('error','Error! Wrong password');
            // return 'salah';
        }
    }

    public function viewProfile($id) {
        $roles = Role::all();
        $result = User::where('admin_id', auth()->user()->admin_id)->findOrFail($id);
        return view('viewProfile',['user' => $result])->with('roles', $roles);
    }
}
