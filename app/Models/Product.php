<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'lead',
        'discount',
        'image',
        'product_link',
    ];

    public function campaign(){
        return $this->hasMany(Campaign::class);
    }
    public function client(){
        return $this->hasMany(Client::class);
    }
    public function lead(){
        return $this->hasMany(Lead::class);
    }
    public function omset(){
        return $this->hasOne(Omset::class);
    }
    public function upselling(){
        return $this->hasOne(Upselling::class);
    }
    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }
}
