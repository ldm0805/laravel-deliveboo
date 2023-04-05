<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;



class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $orders = Order::all();

        $monthly_totals = array();

        foreach($orders as $order) {
        $order_total = $order->total;
        $order_date = $order->date;
        $order_month = date('m', strtotime($order_date));
        
        if(!array_key_exists($order_month, $monthly_totals)) {
            $monthly_totals[$order_month] = 0;
        }
        
        $monthly_totals[$order_month] += $order_total;
        asort($monthly_totals);
        }



        $current_user = User::where('id', $user->id)->get();

        return view('admin.dashboard', compact('current_user', 'monthly_totals'));
    }
}
