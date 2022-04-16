<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'iamge'
        ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
