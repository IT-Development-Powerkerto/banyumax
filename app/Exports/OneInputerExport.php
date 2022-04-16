<?php

namespace App\Exports;

use App\Http\Controllers\RajaOngkirController;
use App\Models\Inputer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OneInputerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;
    function __construct($id) {
        $this->id = $id;
    }
    public function collection()
    {
        $data = DB::table('inputers')
            ->where('admin_id', auth()->user()->admin_id)
            // ->whereBetween('updated_at',[ $this->from_date,$this->to_date])
            // ->where('l.updated_at', $day)
            ->select('lead_id', 'adv_name', 'operator_name', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'product_promotion', 'total_price', 'courier', 'shipping_price', 'shipping_promotion','payment_method', 'total_payment', 'updated_at', 'province_id', 'city_id', 'subdistrict_id')
            ->whereId($this->id)->get();
        // $data.array_push(['test']);
        $province = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/province?id='.$data[0]->province_id);
        $province = $province['rajaongkir']['results']['province'];
        $city = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/city?id='.$data[0]->city_id.'&province='.$data[0]->province_id);
        $city = $city['rajaongkir']['results']['city_name'];
        $subdistrict = Http::withHeaders(['key' => 'c2993a8c77565268712ef1e3bfb798f2'])->get('https://pro.rajaongkir.com/api/subdistrict?id='.$data[0]->subdistrict_id.'&city='.$data[0]->city_id);
        $subdistrict = $subdistrict['rajaongkir']['results']['subdistrict_name'];
        $dataInputer[] = array($data[0]->lead_id, $data[0]->adv_name , $data[0]->customer_name, $province, $city, $subdistrict);
        // return $data;
        // dd($data);
        return collect($dataInputer);
    }
    public function headings(): array
    {
        return [
            'Order ID',
            'REQUESTED TRACKING NUMBER',
            'NAME',
            'ADDRESS 1',
            'PACKAGE TYPE',
            'KECAMATAN',
            'CITY',
            'PROVINCE',
            'EMAIL',
            'CONTACT',
            'Qty',
            'Product Promotion',
            'Total Price',
            'Courier',
            'Shipping Price',
            'Shipping Promotion',
            'Payment Method',
            'Total Payment',
            'Date/Time',
            'Province'
        ];
    }
}
