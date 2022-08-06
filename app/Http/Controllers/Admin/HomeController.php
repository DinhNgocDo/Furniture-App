<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DB;

class HomeController extends Controller
{
    public function home()
    {
        return view('admin.app');
    }

    public function dashboard()
    {
        $tab = "Dashboard";
        
        return view('admin.dashboard', compact([
            "tab",
        ]));
    }

    public function chart()
    {
        $chart = DB::table('orders')
            ->select(DB::raw('month(orders.created_at) as month, sum(order_details.quantity) as product'))
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('status', 2)
            ->groupBy('month')
            ->get();

        return response()->json([
            'list' => $chart
        ]);
    }
}
