<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use  App\Models\Order;
use  App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;



class OrderController extends Controller
{
   
    // Pending Orders
    public function OrdersDetails($order_id)
    {
        $order = Order::with('user')->where('id', $order_id)->first();
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();


        return response()->json([
            'status' => 200,
            'order' => $order,
            'order_item'=> $order_item,
        ]);

    }

    public function PendingOrders()
    {
        $orders = Order::where('status', 'Pending')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);

    }

    public function ProcessingOrders()
    {
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
        
       
    }

    public function ConfirmedOrders()
    {
        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
        

    }

    public function ConfirmedOrdersDetails($order_id)
    {

    }

    public function PickedOrders()
    {
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);

    }

    public function ShippedOrders()
    {
        

    }

    public function DeliveredOrders()
    {

    }

    public function CanceledOrders()
    {

    }

    public function PendingToConfirm($order_id)
    {

    }

    public function ConfirmedToProcessing($order_id)
    {

    }

    public function ProcessingToPicked($order_id)
    {

    }

    public function PickedToShipped($order_id)
    {

    }

    public function ShippedToDelivered($order_id)
    {

    }

    public function DeliveredToCanceled($order_id)
    {

    }

    public function AdminInvoiceDownload($order_id)
    {

    }
}
