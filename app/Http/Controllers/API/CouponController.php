<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function ViewCoupon()
    {  $coupon = Coupon::all();

        return response()->json([
            'status' => 200,
            'coupon' => $coupon,
        ]);

    }

    public function StoreCoupon(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'coupon_name'=>'required|max:191',
            'coupon_discount'=>'required',
            'coupon_validity'=>'required',
           

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
            }
else{
        $coupon = new Coupon;
        $coupon->coupon_name=$request->input('coupon_name');
        $coupon->coupon_discount=$request->input('coupon_discount');
        $coupon->coupon_validity=$request->input('coupon_validity');
        $coupon->status=$request->input('status')== true ? '1':'0' ;
        $coupon->save();
        return response()->json([
            'status'=>200,
            'message'=>'Coupon added succesfully'
        ]);
    }

    }

    public function EditCoupon($id)
    {
        $coupon = Coupon::find($id);
        if($coupon){
            return response()->json([
               'status'=>200,
               'coupon'=>$coupon
   
            ]);
        }
        else {
           return response()->json([
               'status'=>404,
               'message'=>'No Coupon id found'
   
            ]);
   
        }

    }

    public function UpdateCoupon(Request $request, $id)
    {

    }

    public function DeleteCoupon($id)
    {$coupon = Coupon::find($id);
        if($coupon){
            $coupon->delete();

            return response()->json([
                'status'=>200,
                'message'=>'coupon deleted succesfully'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'coupon ID not found'
            ]);

        }

    }

}
