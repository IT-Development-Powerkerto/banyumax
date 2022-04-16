<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsControllerAPI extends Controller
{
    public function index()
    {
        
    }
    public function login(Request $request){
        $data = $request->input();
        // return $data;
        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('POS')-> accessToken;
            $success['name'] =  $user->name;
            return response()->json(['user' => $user ,'success' => $success ]);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
}
