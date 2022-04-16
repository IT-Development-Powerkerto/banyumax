<?php

namespace App\Exports;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadsExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    protected $from_date;
    protected $to_date;
    function __construct($from_date,$to_date) {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }
    public function query()
    {
        $data = DB::table('leads as l')
            ->join('operators as o', 'l.operator_id', '=', 'o.id')
            ->join('products as p', 'l.product_id', '=', 'p.id' )
            ->join('statuses as s', 'l.status_id', '=', 's.id')
            // ->join('clients as c', 'l.client_id', '=', 'c.id')
            ->join('campaigns as cm', 'l.campaign_id', '=', 'cm.id')
            ->select('advertiser', 'o.name as operator_name', 'l.client_name as client_name', 'l.client_whatsapp as client_wa', 'p.name as product_name', 'l.quantity as quantity', 'l.price as price', 'l.total_price as total_price','l.created_at as client_created_at', 's.name as status')
            ->where('l.admin_id', auth()->user()->admin_id)
            ->whereBetween('l.updated_at',[ $this->from_date,$this->to_date])
            // ->where('l.updated_at', $day)
            ->orderByDesc('l.id');


        return $data;
    }
    
    public function headings(): array
    {
        return [
            'ADV Name',
            'CS Name',
            'Customer Name',
            'Customer WA',
            'Product',
            'Qty',
            'Price',
            'Total price',
            'Date/Time',
            'Lead Progress'
        ];
    }
}
