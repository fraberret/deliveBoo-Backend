<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class StatisticController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        $orders = Order::orderByDesc('created_at')->where('restaurant_id', $restaurant->id)->get();

        return view('admin.statistics.index', compact('orders'));
    }
}
