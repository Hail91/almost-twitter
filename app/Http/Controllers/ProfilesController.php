<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    // Display Profile page when requested
    public function show(User $user) {
        return view('profile.show', [
            'user' => $user,
            'posts' => $user->posts()->paginate(10)
        ]);
    }
    // Edit Profile Page
    public function edit(User $user) {
        // Reject ability for user to edit profiles that are not the auth'd user
        abort_if($user->isNot(auth()->user()), 403);
        // Otherwise return the edit page
        return view('profile.edit', compact('user'));
    }
    // Update a user's profile
    public function update(User $user) {
        // Validate request from form
        $attributes = request()->validate([
            'username' => ['string', 'required', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed'],
        ]);
        if(request()->avatar) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);
        return redirect($user->path());
    }
}
