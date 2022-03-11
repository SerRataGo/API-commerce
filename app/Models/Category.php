<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name_en',
        'category_name_ar',
        'category_descripition_en',
        'category_descripition_ar',
        'category_icon',
        'status'
        
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
