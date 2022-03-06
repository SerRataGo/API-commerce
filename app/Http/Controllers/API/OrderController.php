<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use  App\Models\Order;
use  App\Models\OrderItem;
use  App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



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
        $order = Order::with('user')->where('id', $order_id)->first();
        $order_item = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'order' => $order,
        ]);
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
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
        

    }

    public function DeliveredOrders()
    {
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);

    }

    public function CanceledOrders()
    {
        $orders = Order::where('status', 'Canceled')->orderBy('id', 'DESC')->get();
       
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);


    }

    public function PendingToConfirm($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Confirmed',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);
    }

    public function ConfirmedToProcessing($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Processed',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);

    }

    public function ProcessingToPicked($order_id)
    { $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Picked',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);

    }

    public function PickedToShipped($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Shipped',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);
    }

    public function ShippedToDelivered($order_id)
    {
        $product = OrderItem::where('order_id', $order_id)->get();

        foreach($product as $item)
        {
            Product::where('id', $item->id)->update([
                'product_qty' => DB::raw('product_qty-'. $item->qty),
            ]);
        }

        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Delivered',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);
    }

    public function DeliveredToCanceled($order_id)
    {
        $order = Order::findOrFail($order_id);
        $order->update([
            'status' => 'Canceled',
        ]);

        $notification = array(
            'message' => "Order Updated Succesfully",
            'alert-type' => 'success'
        ); 
        return response()->json([
            'status' => 200,
            'order' => $order,
            'notification' => $notification,
        ]);


    }

    public function AdminInvoiceDownload($order_id)
    {

    }
}
