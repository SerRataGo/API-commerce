<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // Pending Orders
    public function OrdersDetails($order_id)
    {

    }

    public function PendingOrders()
    {

    }

    public function ProcessingOrders()
    {

    }

    public function ConfirmedOrders()
    {

    }

    public function ConfirmedOrdersDetails($order_id)
    {

    }

    public function PickedOrders()
    {

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
