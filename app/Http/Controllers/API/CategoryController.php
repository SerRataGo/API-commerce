<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


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

    public function Categorycreate()
    {
        //
    }

    public function CategoryStore(Request $request)
    {
        //
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
