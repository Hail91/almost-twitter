<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Logout method
    public function userLogout(Request $request) {
        Auth::logout();
        // Invalidate the session
        $request->session()->invalidate();
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        // Redirect to Login page
        return redirect('/login');
    }
}
