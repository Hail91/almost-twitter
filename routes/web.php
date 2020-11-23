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

Route::middleware('auth')->group(function() {
    Route::get('/posts', 'PostsController@index')->name('home');
    Route::post('/posts', 'PostsController@store');
    Route::post('/profile/{user:name}/follow', 'FollowsController@store');
    Route::delete('/profile/{user:name}/unfollow', 'FollowsController@destroy');
    Route::get('/profile/{user:name}/edit', 'ProfilesController@edit');
});

// ** NON AUTH PROFILE ROUTES **
Route::get('/profile/{user:name}', 'ProfilesController@show')->name('show');
// ** END NON AUTH PROFILE **
// Auth Routes
Auth::routes();

