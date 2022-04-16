<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class AlmostExpiredResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'from'          => 'Banyumax',
            'id'            => $this->id,
            'name'          => $this->name,
            'expired_in'    => Carbon::parse($this->expired_at)->diffForHumans(),
        ];
    }
}
