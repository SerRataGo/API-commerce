<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use DateTime;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function ViewReport()
    {
       //view
    }

    public function ReportSearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        

        $orders = Order::where('order_date', $formatDate)->latest()->get();
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
    }

    public function ReportSearchByMonth()
    {
        //
    }
    public function ReportSearchByYear()
    {
        //
    }
    public function ReportSearchByColor()
    {
        //
    }
}
