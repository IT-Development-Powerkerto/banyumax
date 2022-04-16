<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement',
        'icon_id'
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function icon(){
        return $this->belongsTo(Icon::class);
    }
}
