<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    // Display Profile page when requested
    public function show(User $user) {
        return view('profile.show', compact('user'));
    }
    // Edit Profile Page
    public function edit(User $user) {
        // Reject ability for user to edit profiles that are not the auth'd user
        abort_if($user->isNot(auth()->user()), 403);
        // Otherwise return the edit page
        return view('profile.edit', compact('user'));
    }
}
