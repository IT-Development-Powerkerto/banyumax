<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inputer extends Model
{
    use HasFactory;
    // use HasFactory, SoftDeletes;
    // protected $fillable = [
    //     'admin_id',
    //     'lead_id',
    //     'adv_name',
    //     'operator_name',
    //     'customer_name',
    //     'customer_number',
    //     'customer_address',
    //     'product_name',
    //     'product_price',
    //     'quantity',
    //     'total_price',
    //     'warehouse',
    //     'courier',
    //     'payment_method',
    //     'total_payment',
    //     'payment_proof'
    //     ];
    protected $guarded = [];
    public function lead() {
        return $this->belongsTo(Lead::class);
    }
    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }
    public function adv(){
        return $this->belongsTo(User::class);
    }
    public function cs(){
        return $this->belongsTo(User::class);
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
