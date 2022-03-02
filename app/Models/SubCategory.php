<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',
        'subcategory_name_en',
        'subcategory_name_ar',
        
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    // public function SubsubCategory()
    // {
    //     return $this->hasMany(SubCategory::class);
    // }

    
}
