<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cousine;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\stringContains;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('cousines', 'dishes')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function filter($searchTerm)
    {

        $filteredRestaurants = Restaurant::with('cousines', 'dishes')->where('name', 'like', '%' . $searchTerm . '%')->get();

        return response()->json([
            'success' => true,
            'results' => $filteredRestaurants
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::with('cousines', 'dishes')->where('slug', $slug)->first();


        if ($restaurant) {
            return response()->json([
                'success' => true,
                'response' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'response' => 'Error 404 not found'
            ]);
        }
    }

    public function filterByCousine($searchCousine)
    {
        //$cousines = Cousine::with('restaurants')->get();
        //dd($searchCousine);

        $restaurants = Restaurant::with('cousines', 'dishes')->get();
        $filteredRestaurants = [];
        foreach ($restaurants as $restaurant) {
            foreach ($restaurant->cousines as $cousine) {
                if ($cousine->name == $searchCousine) {
                    array_push($filteredRestaurants, $cousine);
                }
            }
            // if ($restaurant->cousines() == $searchCousine) {
            //     dd('ok');
            // } else {
            //     dd('non ce');
            // }
        }
        dd($filteredRestaurants);


        // return response()->json([
        //     'success' => true,
        //     'results' => $filteredRestaurants
        // ]);
    }
}
