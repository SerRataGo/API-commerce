<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function AddProduct()
    {
        return "you can adddddddddd any product with details";
    }

    public function ManageProduct()
    {
        //
    }

    public function StoreProduct(Request $request)
    {
        //
    }

    public function MultiImageUpdate(Request $request)
    {

    }

    public function ShowProduct($id)
    {
        //
    }



    public function EditProduct($id)
    {
        $product = Product::find($id);
    if($product){
        return response()->json([
           'status'=>200,
           'product'=>$product

        ]);
    }
    else {
       return response()->json([
           'status'=>404,
           'message'=>'No category id found'

        ]);

    }
    }


    public function UpdateProduct(Request $request, $id)
    {
        //
    }

    public function DeleteProduct($id)
    {
        //
    }

    // product Stock
    public function ProductStock()
    {

    }
}
