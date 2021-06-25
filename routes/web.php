<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    // Post Routes
    Route::get('/posts', 'PostsController@index')->name('home');
    Route::post('/posts', 'PostsController@store')->name('create_post');
    Route::delete('/posts/{id}', 'PostsController@destroy')->name('destroy_post');

    // Profile Routes
    Route::post('/profile/{user:username}/follow', 'FollowsController@store');
    Route::delete('/profile/{user:username}/unfollow', 'FollowsController@destroy');
    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit');
    Route::put('/profile/{user:username}', 'ProfilesController@update');
    Route::get('/explore', 'ExploreController@index');

    // Likes Routes
    Route::post('/posts/{post}/like', 'PostLikesController@store');
    Route::delete('/posts/{post}/like', 'PostLikesController@destroy');

    // User Routes
    Route::get('/logout', 'UserController@userLogout')->name('logout');
});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('show');

// Authentication routes (Register/Login etc...)
Auth::routes();

