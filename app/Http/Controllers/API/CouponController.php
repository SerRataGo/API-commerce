<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

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

    }

    public function EditCoupon($id)
    {

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
