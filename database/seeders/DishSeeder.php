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
                "price" => 12.50,
                "cover_image" => '/img/dishes/spaghetti-carbonara.png',
                "ingredients" => "Spaghetti Pasta, Guanciale, Eggs, Pecorino Cheese, Salt, Black pepper"
            ],
            [
                "name" => "Margherita Pizza",
                "description" => "Traditional pizza topped with tomato sauce, mozzarella cheese, and fresh basil.",
                "price" => 10.00,
                "cover_image" => '/img/dishes/margherita-pizza.png',
                "ingredients" => "Pizza Dough, Tomato Sauce, Mozzarella, Basil, Olive oil, Salt"
            ],
            [
                "name" => "Lasagna",
                "description" => "Layers of pasta, meat sauce, and cheese, baked to perfection.",
                "price" => 14.00,
                "cover_image" => '/img/dishes/lasagna.png',
                "ingredients" => "Lasagna noodles, Ground Beef, Tomato Sauce, Mozzarella, Ham, Parmeasan Cheese, Olive Oil"
            ],
            [
                "name" => "Risotto ai Funghi",
                "description" => "Creamy risotto with a mix of wild mushrooms and parmesan cheese.",
                "price" => 13.50,
                "cover_image" => '/img/dishes/risotto-ai-funghi.png',
                "ingredients" => "Rice, Fresh Mushrooms, Olive Oil, Onion, Butter, Vegetable Broth, White Wine, Black Pepper, Fresh Parsley"
            ],
            [
                "name" => "Tiramisu",
                "description" => "Classic Italian dessert made with layers of coffee-soaked ladyfingers, mascarpone cheese, and cocoa.",
                "price" => 7.00,
                "cover_image" => '/img/dishes/tiramisu.png',
                "ingredients" =>  "Savoiardi Biscuits, Eggs, Mascarpone Cheese, Espresso Coffee, Cocoa Powder Topping"
            ],
            [
                "name" => "Bruschetta",
                "description" => "Grilled bread topped with fresh tomatoes, garlic, and basil.",
                "price" => 6.50,
                "cover_image" => '/img/dishes/bruschetta.png',
                "ingredients" =>  "Sliced Bread, Fresh Tomatoes, Basil, Olive Oil, Mozzarella, Garlic"
            ],
            [
                "name" => "Insalata Caprese",
                "description" => "Salad made with fresh tomatoes, mozzarella cheese, basil, and a drizzle of olive oil.",
                "price" => 8.00,
                "cover_image" => '/img/dishes/insalata-caprese.png',
                "ingredients" =>  "Fresh Tomatoes, Basil, Olive Oil, Mozzarella"
            ],
            [
                "name" => "Osso Buco",
                "description" => "Braised veal shanks with vegetables, white wine, and broth.",
                "price" => 18.00,
                "cover_image" => '/img/dishes/osso-buco.png',
                "ingredients" =>  "Veal Shanks, Onion, White Whine, Butter, Black Pepper, Flour, Olive Oil, Meat Broth"

            ],
            [
                "name" => "Fettuccine Alfredo",
                "description" => "Pasta in a rich and creamy parmesan sauce. This delightful dish features wide, flat fettuccine noodles generously coated in a luxurious Alfredo sauce made from butter and finely grated Parmesan cheese.",
                "price" => 11.00,
                "cover_image" => '/img/dishes/fettuccine-alfredo.png',
                "ingredients" => "Fettucine Pasta, Butter, Parmeasan Cheese"
            ],
            [
                "name" => "Panna Cotta",
                "description" => "Creamy dessert topped with caramel sauce.",
                "price" => 6.00,
                "cover_image" => '/img/dishes/panna-cotta.png',
                "ingredients" => "Fresh Cream, Vanilla, Sugar, Gelatine Sheets"
            ]
        ];

        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->name = $dish['name'];
            $newDish->slug = Str::slug($dish['name'], '-');
            $newDish->cover_image = $dish['cover_image'];
            $newDish->description = $dish['description'];
            $newDish->price = $dish['price'];
            $newDish->ingredients = $dish['ingredients'];
            $newDish->restaurant_id = 1;
            $newDish->save();
        }
    }
}
