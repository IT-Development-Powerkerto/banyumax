<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LeadResource extends JsonResource
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
            'id'              => $this->id,
            'advertiser'      => $this->advertiser,
            'operator'        => $this->operator->name,
            'customer_name'        => $this->client_name,
            'customer_whatsapp'        => $this->client_whatsapp,
            'product'         => $this->product->name,
            'status'          => $this->status->name,
            'created_at'      => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at'      => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
