<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller {
    // Instantiate a follow to a user
    public function store(User $user) {
        // Authenticated user to Follow given user
        auth()->user()->follow($user);
        // Redirect to previous page
        return back();
    }
    // Delete a follow
    public function destroy(User $user) {
        // Destroy the follow relationship between auth user and passed in user
        auth()->user()->unFollow($user);
        // Redirect
        return back();
    }
}
