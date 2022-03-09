<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use DB;

class RateController extends Controller
{
    public function AddProductRate($product_id,Request $request){
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        $rate=DB::table('rates')->where($matchQuery)->first();
        if($rate){
            DB::table('rates')->where($matchQuery)->limit(1)->update(array('rate' => $request->rate,'updated_at'=>\Carbon\Carbon::now()));
            $this->updateProductavgRate($product_id);
            return response()->json("Rate Updated");
        }
        $rate=new Rate;
        $rate->user_id=$request->user_id;
        $rate->product_id=$request->product_id;
        $rate->rate=$request->rate;
        $rate->save();
        $this->updateProductavgRate($product_id);
        return response()->json("Rate Stored");
    }

    public function DeleteProductRate($product_id,Request $request){
        $matchQuery=['user_id'=>$request->user_id,'product_id'=>$product_id];
        $deleted = DB::table('rates')->where($matchQuery)->delete();
        if($deleted<1){
            return response()->json("failed");
        }
        $this->updateProductavgRate($product_id);
        return response()->json("deleted successfully");
    }

    public function updateProductavgRate($product_id){
        $productRates=DB::table('rates')->where(['product_id'=>$product_id])->get();
        $avg=0;
        foreach($productRates as $productRate){
            $avg+=$productRate->rate;
        }
        $ratingCount=count($productRates);
        if($ratingCount>0){
            $avg=$avg/$ratingCount;
        }
        DB::table('products')->where(['id'=>$product_id])->limit(1)->update(array('avgRate' => $avg,'updated_at'=>\Carbon\Carbon::now()));
    }
}
