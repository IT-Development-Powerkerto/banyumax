<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\AcceptPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BigFlipCallbackController extends Controller
{
    public function inquiry(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data, true);
            Inquiry::create([
                'bank_code' => $decoded_data['bank_code'],
                'account_number' => $decoded_data['account_number'],
                'account_holder' => $decoded_data['account_holder'],
                'status' => $decoded_data['status']
            ]);
        }
    }
    public function accept_payment(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data, true);
            DB::table('accept_payments')->insert([
                'p_id' => $decoded_data['id'],
                'bill_link' => $decoded_data['bill_link'],
                'bill_title' => $decoded_data['bill_title'],
                'sender_name' => $decoded_data['sender_name'],
                'sender_bank' => $decoded_data['sender_bank'],
                'amount' => $decoded_data['amount'],
                'status' => $decoded_data['status'],
                'created_at' => $decoded_data['created_at']
            ]);
        }
    }
    public function disbursement(){
        $data = isset($_POST['data']) ? $_POST['data'] : null;
        $token = isset($_POST['token']) ? $_POST['token'] : null;
        if($token === '$2y$13$FfgWfKXTls05dk4h.tKQPOWqcg0JoLmI3zGMx4pzIlx.m693HhgOq'){
            $decoded_data = json_decode($data, true);
            if(is_null($decoded_data['sender'])){
                DB::table('disbursements')->insert([
                    'd_id' => $decoded_data['id'],
                    'user_id' => $decoded_data['user_id'],
                    'amount' => $decoded_data['amount'],
                    'status' => $decoded_data['status'],
                    'timestamp' => $decoded_data['timestamp'],
                    'bank_code' => $decoded_data['bank_code'],
                    'account_number' => $decoded_data['account_number'],
                    'recipient_name' => $decoded_data['recipient_name'],
                    'sender_bank' => $decoded_data['sender_bank'],
                    'remark' => $decoded_data['remark'],
                    'receipt' => $decoded_data['receipt'],
                    'time_served' => $decoded_data['time_served'],
                    'bundle_id' => $decoded_data['bundle_id'],
                    'company_id' => $decoded_data['company_id'],
                    'recipient_city' => $decoded_data['recipient_city'],
                    'created_from' => $decoded_data['created_from'],
                    'direction' => $decoded_data['direction'],
                    'sender_id' => $decoded_data['sender'],
                    'fee' => $decoded_data['fee'],
                ]);
            }
            else{
                $sender_id = DB::table('senders')->insertGetId([
                    'sender_name' => $decoded_data['sender_name'],
                    'place_of_birth' => $decoded_data['place_of_birth'],
                    'date_of_birth' => $decoded_data['date_of_birth'],
                    'address' => $decoded_data['address'],
                    'sender_identity_type' => $decoded_data['sender_identity_type'],
                    'sender_identity_number' => $decoded_data['sender_identity_number'],
                    'sender_country' => $decoded_data['sender_country'],
                    'job' => $decoded_data['job'],
                ]);
                DB::table('disbursements')->insert([
                    'd_id' => $decoded_data['id'],
                    'user_id' => $decoded_data['user_id'],
                    'amount' => $decoded_data['amount'],
                    'status' => $decoded_data['status'],
                    'timestamp' => $decoded_data['timestamp'],
                    'bank_code' => $decoded_data['bank_code'],
                    'account_number' => $decoded_data['account_number'],
                    'recipient_name' => $decoded_data['recipient_name'],
                    'sender_bank' => $decoded_data['sender_bank'],
                    'remark' => $decoded_data['remark'],
                    'receipt' => $decoded_data['receipt'],
                    'time_served' => $decoded_data['time_served'],
                    'bundle_id' => $decoded_data['bundle_id'],
                    'company_id' => $decoded_data['company_id'],
                    'recipient_city' => $decoded_data['recipient_city'],
                    'created_from' => $decoded_data['created_from'],
                    'direction' => $decoded_data['direction'],
                    'sender_id' => $sender_id,
                    'fee' => $decoded_data['fee'],
                ]);
            }
        }
    }
}
