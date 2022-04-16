<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_status',
        'order_id',
        'payment_type',
        'gross_amount',
        'invoice',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}