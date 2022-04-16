<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingRate extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'day_closing_rate',
        'month_closing_rate',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
