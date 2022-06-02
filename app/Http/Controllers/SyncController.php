<?php

namespace App\Http\Controllers;

use App\Models\Inputer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    public function tableClient()
    {
        $clients = DB::table('clients')->get();
        foreach($clients as $client){
            DB::table('leads')->where('client_id', $client->id)->update([
                'client_name' => $client->name,
                'client_whatsapp' => $client->whatsapp
            ]);
        }
    }
    public function tableInputer(){
        $advs = User::where('role_id', 4)->get();
        foreach($advs as $adv){
            Inputer::where('adv_name', $adv->name)->update([
                'adv_id' => $adv->id,
            ]);
        }
        $cs = User::whereIn('role_id', [5,13])->get();
        foreach($cs as $cs){
            Inputer::where('operator_name', $cs->name)->update([
                'cs_id' => $cs->id,
            ]);
        }
    }
    public function warehouse()
    {
        $data_closing = Inputer::all();
        foreach ($data_closing as $d) {
            if($d->warehouse == 'Kosambi'){
                DB::table('inputers')->where('warehouse', 'Kosambi')->update([
                    'warehouse_id' => 4,
                ]);
            }
            elseif($d->warehouse == 'Tandes.Sby'){
                DB::table('inputers')->where('warehouse', 'Tandes.Sby')->update([
                    'warehouse_id' => 3,
                ]);
            }
            elseif($d->warehouse == 'Cilacap'){
                DB::table('inputers')->where('warehouse', 'Cilacap')->update([
                    'warehouse_id' => 1,
                ]);
            }
        }
        return 'sync success';
    }
}
