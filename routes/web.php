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

// ** POSTS **
Route::middleware('auth')->group(function() {
    Route::get('/posts', 'PostsController@index')->name('home');
    // Add a post to Database
    Route::post('/posts', 'PostsController@store');
    // ** END POSTS **
});

// ** PROFILE ROUTES **
Route::get('/profile/{user}', 'ProfilesController@show')->name('show');
// ** END PROFILE **
// Auth Routes 
Auth::routes();

