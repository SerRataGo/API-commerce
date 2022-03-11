<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{

    public function SubCategoryView()
    {
        return SubCategoryResource::collection(SubCategory::all());
    }

    public function SubCategoryStore(Request $request)
    {
        $this->validation($request);
        $subcategory=new SubCategory;
        $subcategory->subcategory_name_en=$request->subcategory_name_en;
        $subcategory->subcategory_name_ar=$request->subcategory_name_ar;
        $subcategory->category_id=$request->category_id;
        $uploaded=$this->uploadImage($request);
        if(!$uploaded){
            return response()->json("image null");
        }
        $subcategory->subcategory_icon=$uploaded;
        $subcategory->save();
        return response()->json("done");
    }

    public function SubCategoryshow($id)
    {
        return new SubCategoryResource(SubCategory::find($id));
    }

    public function SubCategoryEdit($id)
    {
        //
    }

    public function SubCategoryUpdate(Request $request, $id)
    {
        $this->validation($request);
        $subcategory=SubCategory::find($id);
        $subcategory->subcategory_name_en=$request->subcategory_name_en;
        $subcategory->subcategory_name_ar=$request->subcategory_name_ar;
        $subcategory->category_id=$request->category_id;
        $image_path=public_path('/sub_categories/images/'.$subcategory->subcategory_icon);
        unlink($image_path);
        $uploaded=$this->uploadImage($request);
        if(!$uploaded){
            return response()->json("image null");
        }
        $subcategory->subcategory_icon=$uploaded;
        $subcategory->save();
        return response()->json("done");
    }

    public function SubCategoryDelete($id)
    {
        $subcategory=SubCategory::find($id);
        $image_path=public_path('/sub_categories/images/'.$subcategory->subcategory_icon);
        unlink($image_path);
        $subcategory->delete();
        return "deleted successfully";
    }

    public function validation(Request $request){
        $request->validate([
            'subcategory_name_en'=>'required|min:3',
            'subcategory_name_ar'=>'required|min:3',
            'subcategory_icon'=>'required',
            'category_id'=>'required'
        ]);
    }

    public function uploadImage(Request $request){
        $image=$request->file('subcategory_icon');
        if($request->hasFile('subcategory_icon')){ 
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/sub_categories/images'),$new_name);
        }else{
            return false;
        }
        return $new_name;
    }
}
