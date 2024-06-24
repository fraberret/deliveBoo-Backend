<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $faker = FakerFactory::create('it_IT');
        $restaurantIds = range(1, 5);

         foreach ($restaurantIds as $restaurantId) {
            for ($i = 0; $i < 10; $i++) {
                $order = new Order();
                $order->restaurant_id = $restaurantId;
                $order->customer_name = $faker->firstName();
                $order->customer_lastname = $faker->lastName();
                $order->customer_address = $faker->address();
                $order->customer_telephone = '+393' . $faker->numerify('#########');
                $order->customer_email = strtolower(str_replace(' ', '', $order->customer_name . $order->customer_lastname)) . '@mail.com';
                $order->total = 0;
                $order->created_at = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
                $order->updated_at = $order->created_at;
                $order->save();
            }
        }
    }
}
