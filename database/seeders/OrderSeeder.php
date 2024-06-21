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
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->restaurant_id = 1;
            $order->customer_name = $faker->name();
            $order->customer_last_name = $faker->name();
            $order->customer_address = $faker->name();
            $order->customer_telephone = '+123456789123';
            $order->customer_email = $faker->name() . '@mail.it';
            $order->total = 1000;
            $order->save();
        }
    }
}
