<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $restaurantIds = range(1, 5);

        foreach ($restaurantIds as $restaurantId) {
            for ($i = 0; $i < 10; $i++) {
                $order = new Order();
                $order->restaurant_id = $restaurantId;
                $order->customer_name = $faker->name();
                $order->customer_last_name = $faker->name();
                $order->customer_address = $faker->address();
                $order->customer_telephone = '+' . $faker->numerify('############');
                $order->customer_email = $order->customer_name . '@mail.it';
                $order->date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
                $order->total = $faker->randomFloat(2, 10, 500);
                $order->save();
            }
        }
    }

}