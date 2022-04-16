<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budgeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'role_id',
        'reason',
        'requirement',
        'target',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }

}
