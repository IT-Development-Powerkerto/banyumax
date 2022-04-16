<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class AccountsController extends Controller
{
    public function resetPasswordForm($token){
        return view('resetpwd', ['token' => $token]);
    }
    public function resetPassword(Request $request){

        $request->validate([
            'email' => 'required|email'
        ]);
        $user_exists = DB::table('users')->where('email', $request->email)->exists();
        if(!$user_exists){
            return redirect()->back()->with('error_code', 5)->withInput()->with('email','User does not exist');
        }
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(64),
            'created_at' => Carbon::now(),
        ]);
        $tokenData = DB::table('password_resets')->where('email', $request->email)->latest()->first();
        $link = config('app.url').'/ResetPwd/'.$tokenData->token.'?email='.urlencode($request->email);
        (new MailController)->resetPassword($request->email, $tokenData->token);
        return redirect()->back()->with('success', 'Email has been sent');
    }
    public function submitResetPassword(Request $request, $token){
        // $request->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:4|confirmed',
        //     'confirm-password' => 'required'
        // ]);
        $updatePassword = DB::table('password_resets')->where('email', $request->email)->where('token', $token)->get();
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
 
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect('/login')->with('success', 'Your password has been changed!');
    }
}
