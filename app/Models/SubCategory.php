<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'subcategory_name_en',
        'subcategory_name_ar',
        'subcategory_icon'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    
}
