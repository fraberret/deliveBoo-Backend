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

        $dishes = [
            [
                "name" => "Spaghetti Carbonara",
                "description" => "Classic Italian pasta dish made with eggs, cheese, pancetta, and pepper.",
                "price" => 12.50
            ],
            [
                "name" => "Margherita Pizza",
                "description" => "Traditional pizza topped with tomato sauce, mozzarella cheese, and fresh basil.",
                "price" => 10.00
            ],
            [
                "name" => "Lasagna",
                "description" => "Layers of pasta, meat sauce, and cheese, baked to perfection.",
                "price" => 14.00
            ],
            [
                "name" => "Risotto ai Funghi",
                "description" => "Creamy risotto with a mix of wild mushrooms and parmesan cheese.",
                "price" => 13.50
            ],
            [
                "name" => "Tiramisu",
                "description" => "Classic Italian dessert made with layers of coffee-soaked ladyfingers, mascarpone cheese, and cocoa.",
                "price" => 7.00
            ],
            [
                "name" => "Bruschetta",
                "description" => "Grilled bread topped with fresh tomatoes, garlic, and basil.",
                "price" => 6.50
            ],
            [
                "name" => "Insalata Caprese",
                "description" => "Salad made with fresh tomatoes, mozzarella cheese, basil, and a drizzle of olive oil.",
                "price" => 8.00
            ],
            [
                "name" => "Osso Buco",
                "description" => "Braised veal shanks with vegetables, white wine, and broth.",
                "price" => 18.00
            ],
            [
                "name" => "Fettuccine Alfredo",
                "description" => "Pasta in a rich and creamy parmesan sauce.This delightful dish features wide, flat fettuccine noodles generously coated in a luxurious Alfredo sauce made from butter, heavy cream, and finely grated Parmesan cheese.",
                "price" => 11.00
            ],
            [
                "name" => "Panna Cotta",
                "description" => "Creamy dessert topped with berry sauce.",
                "price" => 6.00
            ]
        ];

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug($dish['name'], '-');
            $newDish->cover_image = $faker->imageUrl(400, 200, 'food');
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->save();
        }
    }
}
