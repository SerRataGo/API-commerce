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
        //
    }

    public function CategoryUpdate(Request $request, $id)
    {
        //
    }

    public function CategoryDelete($id)
    {
        //
    }
}
