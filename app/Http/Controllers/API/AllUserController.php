<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Order;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $order = Order::all();

        return response()->json([
            'status' => 200,
            'order' => $order,
        ]);
    }

    public function DetailsOrder($id)
    {
        $order = Order::find($id);
        if($order){
            return response()->json([
               'status'=>200,
               'order'=>$order
   
            ]);
        }
        else {
           return response()->json([
               'status'=>404,
               'message'=>'No order id found'
   
            ]);
   
        }

    }

    public function InvoiceDownload($order_id)
    {

    }

    public function ReturnOrder(Request $request, $order_id)
    {

    }

    public function ReturnedOrderList()
    {

    }

    public function CancelledOrderList()
    {

    }

    public function OrderTracking(Request $request)
    {

    }
}
