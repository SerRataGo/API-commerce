<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
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
            'product_name_en'=>$this->product->product_name_en,
            'product_name_ar'=>$this->product->product_name_es,
            'product_thumbnail'=>$this->product->product_thumbnail,
            'product_item_price'=>$this->product->selling_price,
            'product_item_discount'=>$this->product->discount_price
        ];
    }
}
