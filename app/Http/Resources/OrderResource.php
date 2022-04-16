<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OrderResource extends JsonResource
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
            'id'                   => $this->id,
            'order_id'             => $this->lead_id,
            'advertiser'           => $this->adv_name,
            'operator'             => $this->operator_name,
            'customer_name'        => $this->customer_name,
            'customer_number'    => $this->customer_number,
            'customer_address'     => $this->customer_address,
            'product_name'         => $this->product_name,
            'product_price'        => $this->product_price,
            'product_weight'       => $this->product_weight,
            'quantity'             => $this->quantity,
            'product_promotion_id' => $this->product_promotion_id,
            'product_promotion'    => $this->product_promotion,
            'total_price'          => $this->total_price,
            'warehouse'            => $this->warehouse,
            'province_id'          => $this->province_id,
            'province'             => $this->province,
            'city_id'              => $this->city_id,
            'city'                 => $this->city,
            'subdistrict_id'       => $this->subdistrict_id,
            'subdistrict'          => $this->subdistrict,
            'courier'              => $this->courier,
            'shipping_price'       => $this->shipping_price,
            'shipping_promotion_id'=> $this->shipping_promotion_id,
            'shipping_promotion'   => $this->shipping_promotion,
            'total_shipping'       => $this->total_shipping,
            'shipping_admin'       => $this->shipping_admin,
            'admin_promotion_id'   => $this->admin_promotion_id,
            'admin_promotion'      => $this->admin_promotion,
            'total_admin'          => $this->total_admin,
            'payment_method'       => $this->payment_method,
            'total_payment'        => $this->total_payment,
            'payment_proof'        => url($this->payment_proof),
            'created_at'           => Carbon::parse($this->created_at)->isoFormat('D/M/YYYY HH:mm'),
            'updated_at'           => Carbon::parse($this->updated_at)->isoFormat('D/M/YYYY HH:mm'),
        ];
    }
}
