<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, CascadeSoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $cascadeDeletes = ['cs_inputer', 'inputer'];

    // protected $fillable = [
    //     'name',
    //     'role_id',
    //     'phone',
    //     'username',
    //     'email',
    //     'password',
    //     'image',
    //     'status',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function announcement(){
        return $this->hasMany(Announcement::class);
    }
    public function campaign(){
        return $this->hasMany(Campaign::class);
    }
    public function operator(){
        return $this->hasMany(Operator::class);
    }
    public function promotion(){
        return $this->hasMany(Promotion::class);
    }
    public function lead(){
        return $this->hasMany(Lead::class);
    }
    public function closing_rate(){
        return $this->hasMany(ClosingRate::class);
    }
    public function omset(){
        return $this->hasMany(Omset::class);
    }
    public function upselling(){
        return $this->hasMany(Upselling::class);
    }
    public function paket(){
        return $this->belongsTo(Paket::class);
    }
    public function proof_of_payment(){
        return $this->belongsTo(ProofOfPayment::class);
    }
    public function reimbursement(){
        return $this->hasMany(Reimbursement::class);
    }
    public function budgeting(){
        return $this->hasMany(Budgeting::class);
    }
    public function budgeting_realization(){
        return $this->hasMany(BudgetingRealization::class);
    }
    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }
    public function cs_inputer(){
        return $this->hasMany(CsInputer::class, 'cs_id');
    }
    public function inputer(){
        return $this->hasMany(CsInputer::class, 'inputer_id');
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
