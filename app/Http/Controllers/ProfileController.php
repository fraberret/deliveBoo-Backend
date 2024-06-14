<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Restaurant;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $restaurant = Restaurant::where('user_id', $request->user()->id)->first();

        //dd($restaurant->name);


        $request->user()->fill($request->validated());

        $resturant_val_data =  $request->validate([
            // 'restaurant_name' => ['required', 'unique:restaurants,name', 'min:5', 'max:50'],
            'address' => ['nullable', 'string', 'min:5', 'max:255'],
            'telephone_number' => ['nullable', 'string', 'size:13'],
            'logo' => ['nullable', 'image', 'max:500'],
            'piva' => ['nullable', 'string', 'size:11']
        ]);
        // $restaurant->update($resturant_val_data);

        $restaurant->update($resturant_val_data);


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
