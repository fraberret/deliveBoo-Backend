<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        $dishes = Dish::orderByDesc('id')->where('restaurant_id', $restaurant->id)->paginate(5);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {

        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->name, '-');

        $userId = Auth::id();

        $restaurant = Restaurant::where('user_id', $userId)->first();

        $val_data['restaurant_id'] = $restaurant->id;



        if ($request->has('cover_image')) {

            $img_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $img_path;
        }
        $dish  = Dish::create($val_data);



        return redirect()->route('admin.dishes.index')->with('message', "Dish created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        if (Auth::id() === $dish->restaurant_id) {
            $userId = Auth::id();
            $restaurant = Restaurant::where('user_id', $userId)->first();
            return view('admin.dishes.show', compact('dish', 'restaurant'));
        }
        abort(404, 'Page Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        if (Auth::id() === $dish->restaurant_id) {
            # code...
            return view('admin.dishes.edit', compact('dish'));
        }
        abort(404, 'Page Not Found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->name, '-');

        if ($request->has('cover_image')) {

            if ($dish->cover_image) {
                // delete the old image
                Storage::delete($dish->cover_image);
            }

            $img_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $img_path;
        }


        $dish->update($val_data);

        return redirect()->route('admin.dishes.index')->with('message', "Dish updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->cover_image) {
            Storage::delete($dish->cover_image);
        }

        $dish->delete();

        return redirect()->route('admin.dishes.index')->with('message', 'Dish deleted successfully.');
    }
}
