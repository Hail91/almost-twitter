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
    public function edit() {

    }
}
