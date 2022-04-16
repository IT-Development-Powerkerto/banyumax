<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'promotion_type',
        'product_name',
        'promotion_name',
        'promotion_product_price',
        'promotion_shippment_cost',
        'total_promotion',
    ];

    public function inputer() {
        return $this->hasOne(Inputer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
