<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $dishes = config('dishes');

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug($dish['name'], '-');
            $newDish->cover_image = $dish['cover_image'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->visible = $dish['visible'];
            $newDish->restaurant_id = $dish['restaurant_id'];
            $newDish->save();
        }
    }
}
