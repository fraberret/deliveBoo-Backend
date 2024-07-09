<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        $totalOrders = Order::where('restaurant_id', $restaurant->id)->count();
        $orders = Order::orderByDesc('created_at')->where('restaurant_id', $restaurant->id)->paginate(20);

        return view('admin.orders.index', compact('orders', 'restaurant', 'totalOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        if (Auth::id() === $order->restaurant_id) {
            $userId = Auth::id();
            $restaurant = Restaurant::where('user_id', $userId)->first();
            return view('admin.orders.show', compact('order', 'restaurant'));
        }
        abort(404, 'Page Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
