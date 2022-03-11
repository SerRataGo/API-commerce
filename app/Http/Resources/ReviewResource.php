<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'product_name_es'=>$this->product->product_name_es,
            'user_email'=>$this->user->email,
            'user_name'=>$this->user->name,
            'comment'=>$this->comment,
            'status'=>$this->status
        ];
    }
}
