<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\SubCategory;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

}