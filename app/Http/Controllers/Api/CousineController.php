<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cousine;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\stringContains;

class CousineController extends Controller
{
    public function index()
    {
        $cousines = Cousine::with('restaurants')->get();

        return response()->json([
            'success' => true,
            'results' => $cousines
        ]);
    }

    public function filterByCousine($searchCousine)
    {
        $restaurants = Restaurant::whereHas('cousines', function ($query) use ($searchCousine) {
            $query->where('name', $searchCousine);
        })->with('cousines')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function filterByMultipleCousine($multipleSearch)
    {
        $cuisinesArray = explode(',', $multipleSearch);

        $restaurants = Restaurant::whereHas('cousines', function ($query) use ($cuisinesArray) {
            $query->whereIn('name', $cuisinesArray);
        }, '>=', count($cuisinesArray))->with('cousines')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
