<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\User;
use App\Models\Lead;
use App\Models\Upselling;

class UpsellingController extends Controller
{
    public function upselling(Campaign $campaign, Product $product, User $user){
        // $month = Carbon::now()->format('Y-m');
        $admin_id = Camapign::where('id', $campaign)->value('admin_id');
        $quantity = Lead::where('admin_id', $admin_id)->where('campaign_id', $campaign->id)->where('product_id', $product->id)->where('operator_id',$user->operator->implode('id'))->sum('quantity');
        $month_closing = DB::table('leads as l')->where('l.campaign_id', $admin_id)->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->where('l.status_id', 5)->count();
        $ups = $quantity/$month_closing;
        // $m = Carbon::parse(DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->value('l.created_at'))->format('Y-m');
        // if($m == $month){
        //     $upselling = Lead::where('campaign_id', $campaign->id)->where('product_id', $product->id)->where('operator_id',$user->operator->implode('id'))->sum('quantity');
        //     $max_omset = DB::table('leads as l')->where('l.campaign_id', $campaign->id)->where('l.product_id', $product->id)->join('operators as o', 'o.id', '=', 'l.operator_id')->where('o.user_id', $user->id)->where('l.status_id', 5);
        // }

        return ($ups-1)/10+0.01;
    }
    public function all_upselling()
    {
        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        // $user = User::all();
        $cs = User::where('admin_id', auth()->user()->admin_id)->where('role_id', 5)->get();
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        foreach($cs as $cs){
            foreach($products as $product){
                $quantity = Lead::where('admin_id', auth()->user()->admin_id)->where('product_id', $product->id)->where('user_id',$cs->id)
                        // ->where('status_id', 5)
                        ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->sum('quantity');
                $month_closing = DB::table('leads')->where('admin_id', auth()->user()->admin_id)->where('product_id', $product->id)->where('user_id',$cs->id)
                    ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->where('status_id', 5)->count();
                if($month_closing == 0){
                    continue;
                }
                else{
                    $upselling = $quantity/$month_closing;
                    DB::table('upsellings')->updateOrInsert([
                        'admin_id'      => auth()->user()->admin_id,
                        'user_id'       => $cs->id,
                        'product_id'    => $product->id,
                        'upselling'         => $upselling,
                        'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                        'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                    ]);

                }

            }

        }
        return $quantity;
    }
    public function upselling_point()
    {
        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        // $user = User::all();
        $ups = Upselling::where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        foreach($ups as $ups){
            // foreach($products as $product){

                    $upselling_point = ($ups->upselling-1)/10+0.01;
                    DB::table('upsellings')->where('admin_id', auth()->user()->admin_id)->where('user_id' , $ups->user_id)->where('product_id',$ups->product_id)->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->update([
                        'upselling_point'   => $upselling_point,
                    ]);

            // }

        }
    }
}
