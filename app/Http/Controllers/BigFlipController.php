<?php

namespace App\Http\Controllers;

use App\Models\BigFlip;
use App\Models\User;
use App\Models\Paket;
use App\Models\Lead;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BigFlipController extends Controller
{
    public function index(){
    //     $ch = curl_init();
    //     $secret_key = "JDJ5JDEzJElKVnAzcWN0cWx1Mjk4WDQvdWUuWE9OV0xYRnpXMmwvZmxmQ0NVSEROaVczdWFBMHFLa1FP";

    //     // curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/api/v2/general/balance");
    //     curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/big_sandbox_api/v2/general/balance");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, FALSE);

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     "Content-Type: application/x-www-form-urlencoded"
    //     ));

    //     curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");

    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     return view('bigFlip')->with('balance', json_decode($response, true));
        $users = User::all();
        $pakets = Paket::all();
        $announcement = Announcement::all();
        $lead = Lead::all();
        $count_flexible = User::where('role_id', 1)->where('paket_id', 2)->value('admin_id');
        $all_lead = Lead::where('admin_id', $count_flexible);
        return view('superadmin.bigflip.BigFlip')->with('user', $users)->with('paket', $pakets)->with('leads', $lead)->with('all_lead', $all_lead)->with('announcements', $announcement);

    }
    // public function authentication(){
    //     $secret_key = "JDJ5JDEzJElKVnAzcWN0cWx1Mjk4WDQvdWUuWE9OV0xYRnpXMmwvZmxmQ0NVSEROaVczdWFBMHFLa1FP";
    //     $encoded_auth = base64_encode($secret_key.":");

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: Basic ".$encoded_auth]);
    //     return 'ok';
    // }
    // public function balance(){
    //     $ch = curl_init();
    //     $secret_key = "JDJ5JDEzJElKVnAzcWN0cWx1Mjk4WDQvdWUuWE9OV0xYRnpXMmwvZmxmQ0NVSEROaVczdWFBMHFLa1FP";

    //     // curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/api/v2/general/balance");
    //     curl_setopt($ch, CURLOPT_URL, "https://bigflip.id/big_sandbox_api/v2/general/balance");
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, FALSE);

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     "Content-Type: application/x-www-form-urlencoded"
    //     ));

    //     curl_setopt($ch, CURLOPT_USERPWD, $secret_key.":");

    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     var_dump($response);
    // }

    public function AcceptPayment(){
        $users = User::all();
        $pakets = Paket::all();
        $announcement = Announcement::all();
        $lead = Lead::all();
        $count_flexible = User::where('role_id', 1)->where('paket_id', 2)->value('admin_id');
        $all_lead = Lead::where('admin_id', $count_flexible);
        return view('superadmin.bigflip.payment')->with('user', $users)->with('paket', $pakets)->with('leads', $lead)->with('all_lead', $all_lead)->with('announcements', $announcement);
    }

}
