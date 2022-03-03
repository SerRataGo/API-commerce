<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'subcategory_name_en'=>$this->subcategory_name_en,
            'subcategory_name_ar'=>$this->subcategory_name_ar,
            'subcategory_icon'=>'/sub_categories/images/'.$this->subcategory_icon,
            'category_name_en'=>$this->Category->category_name_en,
            'category_name_ar'=>$this->Category->category_name_es
        ];
    }
}
