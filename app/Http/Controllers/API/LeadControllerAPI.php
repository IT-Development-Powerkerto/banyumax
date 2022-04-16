<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\LeadResource;
use App\Models\Lead;
use App\Models\Operator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeadControllerAPI extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if($request->date_filter){
            $day = Carbon::parse($request->date_filter)->format('Y-m-d');
        } else {
            $day = Carbon::now()->format('Y-m-d');
        }
        if($user->role_id == 1){
            $leads = Lead::where('admin_id', $user->admin_id)->whereDate('created_at', $day)->where('admin_id', $user->admin_id)->latest()->get();
            $total_lead = Lead::where('admin_id', $user->admin_id)->count();
            $total_closing = Lead::where('admin_id', $user->admin_id)->where('status_id', 5)->count();
            $daily_lead = Lead::where('admin_id', $user->admin_id)->whereDate('created_at', $day)->count();
            $daily_closing = Lead::where('admin_id', $user->admin_id)->whereDate('created_at', $day)->where('status_id', 5)->count();
        }else if($user->role_id == 5){
            $leads = Lead::where('admin_id', $user->admin_id)->whereDate('created_at', $day)->where('user_id', $user->id)->latest()->get();
            $total_lead = Lead::where('admin_id', $user->admin_id)->where('user_id', $user->id)->count();
            $total_closing = Lead::where('admin_id', $user->admin_id)->where('user_id', $user->id)->where('status_id', 5)->count();
            $daily_lead = Lead::where('admin_id', $user->admin_id)->where('user_id', $user->id)->whereDate('created_at', $day)->count();
            $daily_closing = Lead::where('admin_id', $user->admin_id)->where('user_id', $user->id)->whereDate('created_at', $day)->where('status_id', 5)->count();
        }else if($user->role_id == 4){
            $leads = Lead::where('admin_id', $user->admin_id)->where('advertiser', $user->name)->whereDate('created_at', $day)->latest()->get();
            $total_lead = Lead::where('admin_id', $user->admin_id)->where('advertiser', $user->name)->count();
            $total_closing = Lead::where('admin_id', $user->admin_id)->where('advertiser', $user->name)->where('status_id', 5)->count();
            $daily_lead = Lead::where('admin_id', $user->admin_id)->where('advertiser', $user->name)->whereDate('created_at', $day)->count();
            $daily_closing = Lead::where('admin_id', $user->admin_id)->where('advertiser', $user->name)->whereDate('created_at', $day)->where('status_id', 5)->count();
        }
        // $total_lead = Lead::count();
        // $total_closing = Lead::where('status_id', 5)->count();
        // return $total_lead;
        return response()->json([
            'total_lead' => $total_lead,
            'total_closing' => $total_closing,
            'daily_lead' => $daily_lead,
            'daily_closing' => $daily_closing,
            'leads' => LeadResource::collection($leads)
        ], 200);
    }
}
