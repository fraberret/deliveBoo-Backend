<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CousineSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RestaurantSeeder;
use Database\Seeders\DishSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\DishOrderSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CousineSeeder::class, UserSeeder::class, RestaurantSeeder::class, DishSeeder::class, OrderSeeder::class, DishOrderSeeder::class]);
    }
}
