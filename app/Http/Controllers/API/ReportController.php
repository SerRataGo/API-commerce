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

    public function ReportSearchByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
    }
    public function ReportSearchByYear(Request $request)
    {
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return response()->json([
            'status' => 200,
            'orders' => $orders,
        ]);
    }
   
}
