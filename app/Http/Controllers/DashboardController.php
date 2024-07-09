<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        $dishes = Dish::orderByDesc('id')->where('restaurant_id', $restaurant->id)->get();

        $orders = Order::orderByDesc('created_at')->where('restaurant_id', $restaurant->id)->get();
        $totalOrders = Order::where('restaurant_id', $restaurant->id)->count();

        return view('dashboard', compact('userId', 'restaurant', 'dishes', 'orders', 'totalOrders'));
    }
}
