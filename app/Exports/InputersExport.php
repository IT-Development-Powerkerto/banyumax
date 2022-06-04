<?php

namespace App\Exports;

use App\Models\CsInputer;
use App\Models\Inputer;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InputersExport implements WithHeadings, FromCollection, WithColumnFormatting, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $from_date;
    protected $to_date;
    function __construct($from_date,$to_date) {
        $this->from_date = Carbon::parse($from_date)->format('Y-m-d');
        $this->to_date = Carbon::parse($to_date)->format('Y-m-d');
    }
    public function collection()
    {
        $cs_id = CsInputer::where('inputer_id', auth()->user()->id)->pluck('cs_id');
        $operator_name = DB::table('users')->whereIn('id', $cs_id)->pluck('name');
        $data = Inputer::whereHas('lead', function($q){
                $q->where('status_id', 5);
            })
            ->where('admin_id', auth()->user()->admin_id)
            ->whereBetween('created_at',[$this->from_date,$this->to_date])
            ->whereIn('operator_name', $operator_name)
            ->select('lead_id','adv_name', 'operator_name', 'province', 'customer_name', 'customer_number', 'customer_address', 'product_name', 'product_price', 'product_weight', 'quantity', 'product_promotion', 'add_product_promotion', 'total_price', 'courier', 'shipping_price', 'shipping_promotion', 'add_shipping_promotion', 'total_shipping','shipping_admin', 'admin_promotion', 'add_admin_promotion', 'total_admin', 'payment_method', 'total_payment', 'updated_at', 'warehouse', 'city', 'warehouse_id')
            ->get();
        $dataInputer[] = array();

        foreach($data as $data){
            // if($data->warehouse == 'Cilacap'){
            //     $wh = 'C';
            // }else if($data->warehouse == 'Kosambi'){
            //     $wh = 'K';
            // }else if($data->warehouse == 'Tandes.Sby'){
            //     $wh = 'S';
            // }else{
            //     $wh = 'Not Yet';
            // }
            $warehouse = Warehouse::whereId($data->warehouse_id)->first();
            $date = $data->updated_at;
            $year = date('y', strtotime($date));
            $month = date('n', strtotime($date));
            $n = intval($month);
            $res = '';

            $roman_numerals = array(
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1
            );
            // if($data->warehouse == 'Cilacap'){
            //     $warehouse = 'Cilacap';
            // }else if($data->warehouse == 'Kosambi'){
            //     $warehouse = 'Kosambi';
            // }else if($data->warehouse == 'Tandes.Sby'){
            //     $warehouse = 'Surabaya';
            // }else{
            //     $warehouse = 'Not Yet';
            // }

            foreach ($roman_numerals as $roman => $numeral)
            {
            $matches = intval($n / $numeral);
            $res .= str_repeat($roman, $matches);
            $n = $n % $numeral;
            }

            $adv_nickname = User::where('name', $data->adv_name)->value('nickname');
            $cs_nickname = User::where('name', $data->operator_name)->value('nickname');
            $dataInputer[] = array(
                'Order ID' => $data->lead_id,
                'ADV Name' => $data->adv_name,
                'CS Name' => $data->operator_name,
                'Customer Name' => $data->customer_name,
                'Warehouse' => $warehouse->name,
                'Dest City' => $data->city,
                'Dest Province' => $data->province,
                'Customer WA' => $data->customer_number,
                'Address' => $data->customer_address,
                'Product' => $data->product_name,
                'Price' => $data->product_price,
                'Weight' => $data->product_weight,
                'Qty' => $data->quantity,
                'Product Promotion' => $data->product_promotion,
                'Additional Product Promotion' => $data->add_product_promotion,
                'Total Price' => $data->total_price,
                'Courier' => $data->courier,
                'Shipping Price' => $data->shipping_price,
                'Shipping Promotion' => $data->shipping_promotion,
                'Additional Shipping Promotion' => $data->add_shipping_promotion,
                'Total Shipping' => $data->total_shipping,
                'Shipping Admin' => $data->shipping_admin,
                'Admin Promotion' => $data->admin_promotion,
                'Additional Admin Promotion' => $data->add_admin_promotion,
                'Total Admin' => $data->total_admin,
                'Payment Method' => $data->payment_method,
                'Total Payment' => $data->total_payment,
                'Date/Time' => date('d-m-Y H:i:s', strtotime($data->updated_at)),
                'Shipping Instruction' => $data->product_name.' '.$data->quantity.' '.$data->operator_name,
                'Invoice' => 'PWK.WP.'.($warehouse->initials ?? 'Initials Not Set').'/'.$year.'/'.$res.'-'.$data->lead_id,
                'Tags' => ($cs_nickname ?? 'Not Set').'||'.$data->courier.'|Adv.'.($adv_nickname ?? 'Not Set').'|JAHanif',
            );
        }
        // return $data;
        // dd($data);
        return collect($dataInputer);
        // $dataInputer = Inputer::whereBetween('created_at',[ $this->from_date,$this->to_date])->get();
        // dd($dataInputer);
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'ADV Name',
            'CS Name',
            'Customer Name',
            'Warehouse',
            'Dest City',
            'Dest Province',
            'Customer WA',
            'Address',
            'Product',
            'Price',
            'Weight',
            'Qty',
            'Product Promotion',
            'Additional Product Promotion',
            'Total Price',
            'Courier',
            'Shipping Price',
            'Shipping Promotion',
            'Additional Shipping Promotion',
            'Total Shipping',
            'Shipping Admin',
            'Admin Promotion',
            'Additional Admin Promotion',
            'Total Admin',
            'Payment Method',
            'Total Payment',
            'Date Closing',
            'Shipping Instruction',
            'Invoice',
            'Tags'
        ];
    }
    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_NUMBER,
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 9,
            'B' => 15,
            'C' => 15,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 20,
            'H' => 20,
            'I' => 9,
            'J' => 9,
            'K' => 9,
            'L' => 9,
            'M' => 18,
            'N' => 10,
            'O' => 9,
            'P' => 13,
            'Q' => 19,
            'R' => 16,
            'S' => 14,
            'T' => 14,
            'U' => 25,
            'V' => 20,
            'W' => 20,
            'X' => 20,
            'Y' => 20,
            'Z' => 20,
            'AA' =>20,
            'AB' => 20,
            'AC' => 20,
            'AD' => 15,
            'AE' => 15
        ];
    }
}
