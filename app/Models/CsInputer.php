<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CsInputer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cs_inputers';
    protected $guarded = ['id'];

    public function cs(){
        return $this->belongsTo(User::class);
    }
}
