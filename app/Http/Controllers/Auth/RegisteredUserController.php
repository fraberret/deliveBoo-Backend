<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cousine;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Storage;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cousines = Cousine::all();

        return view('auth.register', compact('cousines'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'unique:restaurants,name', 'string', 'min:2', 'max:25'],
            'cousines' => ['required', 'exists:cousines,id'],
            'address' => ['nullable', 'string', 'min:5', 'max:255'],
            'telephone_number' => ['nullable', 'string', 'size:13'],
            'logo' => ['nullable', 'image', 'max:500'],
            'piva' => ['nullable', 'string', 'size:11'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $img_path = null;

        if ($request->has('logo')) {

            $img_path = Storage::put('uploads', $request->logo);
            // $validated['preview_image'] = $img_path;
        }


        $restaurant = Restaurant::create([
            'name' => $request->restaurant_name,
            'slug' => Str::slug($request->restaurant_name, '-'),
            'address' => $request->address,
            'telephone_number' => $request->telephone_number,
            'logo' =>  $img_path,
            'piva' => $request->piva,
            'user_id' => $user->id, // set relationship ???
        ]);

        if ($request->has('cousines')) {
            $restaurant->cousines()->attach($request['cousines']);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
