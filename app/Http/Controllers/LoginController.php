<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
        // $credentials = $request -> validate([
        //     //terlalu ketat harus gmail 'email' => 'required|email:dns',
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);


        $data = $request->input();
        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $role_id = auth()->user()->role_id;
            $admin_id = auth()->user()->admin_id;
            $exp = auth()->user()->exp;

            if ($exp == 0){
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('error', 'sorry your account is being processed, we will notify you via email');
            }
            elseif($admin_id == 1){
                $request->session()->regenerate();
                return redirect('/superadmin');
            }
            elseif($role_id == 1){
                $request->session()->regenerate();
                return redirect('/dashboard');
            }
            elseif($role_id == 4){
                $request->session()->regenerate();
                return redirect('/adv');
            }
            elseif($role_id == 5){
                $request->session()->regenerate();
                return redirect('/cs');
            }
        }
        // elseif (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'role_id' => '4'])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('adv');
        // }
        // elseif (Auth::attempt(['username' => $data['username'], 'password' => $data['password'], 'role_id' => '5'])){
        //     $request->session()->regenerate();
        //     return redirect()->intended('cs');
        // }
        return back()->with('error', 'Login Failed!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }

}
