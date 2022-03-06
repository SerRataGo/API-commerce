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

    public function DetailsOrder($order_id)
    {

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
