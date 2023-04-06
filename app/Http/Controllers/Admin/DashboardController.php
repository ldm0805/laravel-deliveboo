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

       
        $current_user = User::where('id', $user->id)->get();

        return view('admin.dashboard', compact('current_user'));
    }
}
