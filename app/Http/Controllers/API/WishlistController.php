<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Http\Resources\WishlistResource;
use DB;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id)
    {
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        $wishItems=DB::table('wishlists')->where($matchQuery)->get();
        if(count($wishItems)>0){
            return response()->json("Item already added to wishlist");
        }
        try{
            $wishItem=new Wishlist;
            $wishItem->user_id=$request->user_id;
            $wishItem->product_id=$product_id;
            $wishItem->save();
        }catch(Exception $e){
            return $e->getMessage();
        }
        return response()->json("done");
    }

    public function ViewWishlist()
    {
        return Wishlist::all();
    }

    public function GetWishlistProduct(Request $request)
    {
        $matchQuery=['user_id'=>$request->user_id];
        $wishItems=DB::table('wishlists')->where($matchQuery)->get();
        $items=array();
        foreach($wishItems as $wishItem){
            $item =new Wishlist;
            $item->user_id=$wishItem->user_id;
            $item->product_id=$wishItem->product_id;
            $item->updated_at=$wishItem->updated_at;
            $item->created_at=$wishItem->created_at;
            array_push($items,$item);
        }
        return WishlistResource::collection($items);
    }
    public function RemoveWishlistProduct(Request $request,$product_id)
    {
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        $deleted = DB::table('wishlists')->where($matchQuery)->delete();
        if($deleted<1){
            return "failed";
        }
        return "deleted successfully";
    }

}
