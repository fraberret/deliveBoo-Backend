<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Cousine;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(), 'cousines' => Cousine::all()
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

        $restaurant_val_data =  $request->validate([
            'name' => ['required', 'min:2', 'max:25', Rule::unique('restaurants')->ignore($restaurant->id)],
            'cousines' => ['required', 'exists:cousines,id'],
            'address' => ['nullable', 'string', 'min:5', 'max:255'],
            'telephone_number' => ['nullable', 'string', 'size:13'],
            'logo' => ['nullable', 'image', 'max:500'],
            'piva' => ['nullable', 'string', 'size:11']
        ]);
        // $restaurant->update($resturant_val_data);

        if ($request->has('logo')) {


            if ($restaurant->logo) {
                // delete the old image
                Storage::delete($restaurant->logo);
            }

            $img_path = Storage::put('uploads', $request->logo);
            $restaurant_val_data['logo'] = $img_path;
        }

        $restaurant_val_data['name'] = $request->restaurant_name;
        $restaurant_val_data['slug'] = Str::slug($request->restaurant_name, '-');

        if ($request->has('cousines')) {
            $restaurant->cousines()->sync($restaurant_val_data['cousines']);
        } else {
            $restaurant->cousines()->detach();
        }




        $restaurant->update($restaurant_val_data);


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

        $restaurant = Restaurant::where('user_id', $user->id)->first();

        Auth::logout();

        $user->delete();
        $restaurant->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
