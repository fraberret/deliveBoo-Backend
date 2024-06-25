<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $orders = Order::all();
        $dishes = Dish::all();

        foreach ($orders as $order) {
            $dishes = Dish::where('restaurant_id', $order->restaurant_id)->get();

            if ($dishes->isEmpty()) {
                continue;
            }
            
            $numDishes = min(rand(1, 5), $dishes->count());
            $selectedDishes = $dishes->random($numDishes);
            $orderTotal = 0;

            foreach ($selectedDishes as $dish) {
                $quantity = rand(1, 5);
                $total = $dish->price * $quantity;
                $orderTotal += $total;
                
                DB::table('dish_order')->insert([
                    'dish_id' => $dish->id,
                    'order_id' => $order->id,
                    'quantity' => $quantity,
                    'total' => $total,
                ]);
            }

            $order->total = $orderTotal;
            $order->save();
        }
    }
}
