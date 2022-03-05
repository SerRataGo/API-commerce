<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Http\Resources\CartResource;
use DB;

class CartController extends Controller
{
    public function viewAllCarts(){
        return Cart::all();
    }

    public function MyCart(Request $request)
    {
        $matchQuery=['user_id'=>$request->user_id];
        $cartItems=DB::table('carts')->where($matchQuery)->get();
        $items=array();
        foreach($cartItems as $cartItem){
            $item =new Cart;
            $item->user_id=$cartItem->user_id;
            $item->product_id=$cartItem->product_id;
            $item->count=$cartItem->count;
            $item->updated_at=$cartItem->updated_at;
            $item->created_at=$cartItem->created_at;

            array_push($items,$item);
        }
        return CartResource::collection($items);
    }

    public function addProductToCart($product_id,Request $request)
    {
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        
        $cartItem=DB::table('carts')->where($matchQuery)->first();
    
        if($cartItem!=null){

            DB::table('carts')->where($matchQuery)->limit(1)->update(array('count' => ++$cartItem->count,'updated_at'=>\Carbon\Carbon::now()));
            return response()->json("done");
        }

        try{
        $cartItem=new Cart;
        $cartItem->user_id=$request->user_id;
        $cartItem->product_id=$product_id;
        $cartItem->count=1;
        $cartItem->save();
        }catch(Exception $e){
            return $e->getMessage();
        }
        return response()->json("done");
    }

    public function RemoveCartProduct($product_id,Request $request)
    {
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        $deleted = DB::table('carts')->where($matchQuery)->delete();
        if($deleted<1){
            return response()->json("failed");
        }
        return response()->json("deleted successfully");
    }
}
