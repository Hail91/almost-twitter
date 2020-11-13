<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Base Route
Route::get('/', function () {
    return view('welcome');
});

// ** AUTH POSTS **
Route::middleware('auth')->group(function() {
    Route::get('/posts', 'PostsController@index')->name('home');
    // Add a post to Database
    Route::post('/posts', 'PostsController@store');
    // ** END AUTH POSTS **
    // * AUTH PROFILE **
    // Initiate a follow to specific user from the logged in user
    Route::post('/profile/{user:name}/follow', 'FollowsController@store');
    Route::delete('/profile/{user:name}/unfollow', 'FollowsController@destroy');
    // ** END AUTH PROFILE **
});

// ** NON AUTH PROFILE ROUTES **
Route::get('/profile/{user:name}', 'ProfilesController@show')->name('show');
// ** END NON AUTH PROFILE **
// Auth Routes 
Auth::routes();

