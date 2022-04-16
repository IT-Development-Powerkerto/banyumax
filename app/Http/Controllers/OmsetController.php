<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Lead;
use App\Models\Omset;
use App\Models\Campaign;
use App\Models\Operator;
use App\Models\Product;
use App\Models\User;
use GrahamCampbell\ResultType\Result;

class OmsetController extends Controller
{
    public function omset(Campaign $campaign, Product $product, User $user){

        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        $admin_id = Lead::where('admin_id', auth()->user()->admin_id)->value('admin_id');
        // get omset cs per product per month
        $omset = Lead::where('admin_id', $admin_id)->where('campaign_id', $campaign->id)->where('product_id', $product->id)
            ->where('operator_id',$user->operator->implode('id'))->where('status_id', 5)
            ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)
            ->sum('total_price');
        // get max omset per product per month
        // $max_omset = DB::table('omsets')->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->max('omset');
        // if(is_null($max_omset)){
        //     $max_omset = $omset;
        // }else{
        //     $max_omset = $max_omset;
        // }
        DB::table('omsets')->updateOrInsert([
            'admin_id'      => $admin_id,
            'user_id'       => $user->id,
            'product_id'    => $product->id,
            'omset'         => $omset,
            'created_at'  => date('Y-m-d', strtotime('- 1 month')),
            'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
        ]);

        // DB::table('omsets')->where('user_id' , $user->id)->update([
        //     'omset_point'   => $omset / $max_omset ,
        //     'created_at'  => date('Y-m-d', strtotime('- 1 month')),
        //     'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
        // ]);
        // return $omset;

        // return response()->json($omset/$max_omset);

        // return date('Y-m-d', strtotime('- 1 month'));
    }
    public function all_omset(){

        // $month = Carbon::now()->format('Y-m');
        // ambil bulan sebelumnya
        $month = date('n', strtotime('-1 month'));
        // jika bulan sebelumnya adalah bulan 12, tahun -1
        if($month == 12){
            $year = date('Y', strtotime('-1 year'));
        }else{
            $year = date('Y');
        }
        $admin_id = Lead::where('admin_id', auth()->user()->admin_id)->value('admin_id');
        // $user = User::all();
        $cs = User::where('role_id', 5)->where('admin_id', auth()->user()->admin_id)->get();
        $products = Product::where('admin_id', auth()->user()->admin_id)->get();
        foreach($cs as $cs){
            foreach($products as $product){
                $find_omset = Lead::where('user_id', $cs->id)->where('product_id', $product->id)->where('admin_id', $admin_id)->exists();
                if(!$find_omset){

                    continue;
                }
                else{
                    $omset = Lead::where('user_id', $cs->id)->where('product_id', $product->id)
                    ->where('admin_id', $admin_id)
                    ->where('status_id', 5)
                                ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)
                                ->sum('total_price');

                    DB::table('omsets')->updateOrInsert([
                        'admin_id'      => $admin_id,
                        'user_id'       => $cs->id,
                        'product_id'    => $product->id,
                        'omset'         => $omset,
                        'created_at'  => date('Y-m-d', strtotime('- 1 month')),
                        'updated_at'  => date('Y-m-d', strtotime('- 1 month')),
                    ]);
                }
            }

        }

    }
    public function omset_point()
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
        $admin_id = Lead::where('admin_id', auth()->user()->admin_id)->value('admin_id');
        $cs = Omset::orderBy('omset')->get();
        $products = Product::all();
        foreach($cs as $cs){
            foreach($products as $product){
                $find_omset = Omset::where('user_id', $cs->user_id)->where('product_id', $product->id)->where('admin_id', $admin_id)->exists();
                if($find_omset){

                    $omset = DB::table('omsets')->where('admin_id', $admin_id)->where('user_id', $cs->user_id)->where('product_id', $product->id)->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->value('omset');
                    $max_omset = DB::table('omsets')->where('admin_id', $admin_id)->where('product_id', $product->id)->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->orderByDesc('omset')->max('omset');
                    DB::table('omsets')->where('admin_id', $admin_id)->where('user_id' , $cs->user_id)->where('product_id', $product->id)->update([
                        'omset_point'   => $omset / $max_omset ,
                    ]);
                }
                else{
                    continue;
                }
            }
        }
    }
}
