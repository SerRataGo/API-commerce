<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{

    public function CategoryView()
    {
        $category = Category::all();
        return response()->json([
        'status'=>200,
        'category'=>$category

        ]);
    }

    public function CategoryStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_name_en'=>'required|max:191',
            'category_name_ar'=>'required|max:191',
            'category_descripition_en'=>'required|max:191',
            'category_descripition_ar'=>'required|max:191',
            'category_icon'=>'required',

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
            }
else{
        $category = new Category;
        $category->category_name_en=$request->input('category_name_en');
        $category->category_name_ar=$request->input('category_name_ar');
        $category->category_descripition_en=$request->input('category_descripition_en');
        $category->category_descripition_ar=$request->input('category_descripition_ar');
        $category->category_icon=$request->input('category_icon');
         $category->status=$request->input('status')== true ? '1':'0' ;
        $category->save();
        return response()->json([
            'status'=>200,
            'message'=>'category added succesfully'
        ]);
    }
    }

    public function CategoryEdit($id)
    {
        $category = Category::find($id);
        if($category){
            return response()->json([
               'status'=>200,
               'category'=>$category
   
            ]);
        }
        else {
           return response()->json([
               'status'=>404,
               'message'=>'No category id found'
   
            ]);
   
        }
    }

    public function CategoryUpdate(Request $request, $id)
    {
        //
    }

    public function CategoryDelete($id)
    {
        $category = Category::find($id);
        if($category){
            $category->delete();

            return response()->json([
                'status'=>200,
                'message'=>'category deleted succesfully'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'category ID not found'
            ]);

        }
    }
}
