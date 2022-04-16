<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    
    public function get_province($id)
    {
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province?id='.$id);
        $response = json_decode($response, true);
        $province = $response['rajaongkir']['results'];
        return json_encode($province);
    }
    public function get_city($id)
    {
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?&province='.$id);
        $response = json_decode($response, true);
        $city = $response['rajaongkir']['results'];
        return json_encode($city);
    }
    public function get_subdistrict($id)
    {
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?city='.$id);
        $response = json_decode($response, true);
        $subdistrict = $response['rajaongkir']['results'];
        return json_encode($subdistrict);
    }
    public function cek(Request $request)
    {
        if($request->courier == 'jne oke' || $request->courier == 'jne reg'){
            $courier = 'jne';
        }else{
            $courier = $request->courier;
        }
        $response = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])
            ->post('https://pro.rajaongkir.com/api/cost', [
                'origin' => $request->origin,
                'originType' => 'subdistrict',
                'destination' => $request->destination,
                'destinationType' => 'subdistrict',
                'weight' => $request->weight,
                'courier' => $courier,

            ]);
        $response = json_decode($response, true);
        $ongkir = $response;
        if($request->courier == 'jne reg'){
            return $ongkir['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'];
        }else{
            return $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        }
        // return json_encode($response);
        // return $ongkir;
    }
}
