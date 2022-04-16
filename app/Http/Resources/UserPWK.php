<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Models\ProofOfPayment;

class UserPWK extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $proof_payment = ProofOfPayment::where('user_id', $this->id)->value('image');

        return [
            'from'          => 'Banyumax',
            'id'            => $this->id,
            'role'       => $this->role,
            'paket'         => $this->paket,
            'name'          => $this->name,
            'username'      => $this->username,
            'email'         => $this->email,
            'phone'         => $this->phone,
            // 'password'      => $this->password,
            'image'         => $this->image,
            'exp'           => $this->exp,
            'proof_payment' => url($proof_payment),
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'expired_at'    => $this->expired_at,
            'expired_in'    => Carbon::parse($this->expired_at)->diffForHumans(),
        ];
    }
}
