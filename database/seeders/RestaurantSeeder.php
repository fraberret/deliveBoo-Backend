<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Ristorante Daje',
                'telephone_number' => '+390123456789',
                'logo' => '/img/restaurants/Daje.jpeg',
                'address' => 'Via San Giovanni, 1',
                'piva' => '12345678901',
                'cousines' => [1]
            ],
            [
                'user_id' => 2,
                'name' => "Pizzeria Da Niele",
                'telephone_number' => '+390987654321',
                'logo' => '/img/restaurants/Da_niele.jpeg',
                'address' => 'Via Delle Palme, 2',
                'piva' => '98765432109',
                'cousines' => [1, 8]
            ],
            [
                'user_id' => 3,
                'name' => "Trattoria Dell'Olio",
                'telephone_number' => '+390123987654',
                'logo' => '/img/restaurants/Olio.jpeg',
                'address' => 'Corso Italia, 15',
                'piva' => '56789012345',
                'cousines' => [1, 7]
            ],
            [
                'user_id' => 4,
                'name' => 'Cake Design',
                'telephone_number' => '+390456123789',
                'logo' => '/img/restaurants/Cake.jpeg',
                'address' => 'Piazza Bologna, 10',
                'piva' => '34567890123',
                'cousines' => [2]
            ],
            [
                'user_id' => 5,
                'name' => 'Serra Cafè',
                'telephone_number' => '+390987123456',
                'logo' => '/img/restaurants/Cafe.jpeg',
                'address' => 'Viale Taranto, 22',
                'piva' => '23456789012',
                'cousines' => [2, 9]
            ]
        ];

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name'], '-');
            $newRestaurant->telephone_number = $restaurant['telephone_number'];
            $newRestaurant->logo = $restaurant['logo'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->piva = $restaurant['piva'];
            $newRestaurant->save();
            $newRestaurant->cousines()->sync($restaurant['cousines']);
        }
    }
}
