<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{

    public function SubCategoryView()
    {
        return SubCategory::all();
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name_en'=>'required|min:3|unique:sub_categories',
            'subcategory_name_ar'=>'required|min:3|unique:sub_categories',
            'category_id'=>'required'
        ]);
        
        $subcategory=new SubCategory;
        $subcategory->subcategory_name_en=$request->subcategory_name_en;
        $subcategory->subcategory_name_ar=$request->subcategory_name_ar;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();
        return "done";
    }

    public function SubCategoryshow($id)
    {
        return SubCategory::find($id);
    }

    public function SubCategoryEdit($id)
    {
        //
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'subcategory_name_en'=>'required|min:3|unique:sub_category',
            'subcategory_name_ar'=>'required|min:3|unique:sub_category',
            'category_id'=>'required'
        ]);

        $subcategory=SubCategory::find($id);
        $subcategory->subcategory_name_en=$request->subcategory_name_en;
        $subcategory->subcategory_name_ar=$request->subcategory_name_ar;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();
        return "done";
    }

    public function SubCategoryDelete($id)
    {
        SubCategory::destroy($id);
        return "deleted successfully";
    }
}
