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
    Route::post('/profile/{user:username}/follow', 'FollowsController@store');
    Route::delete('/profile/{user:username}/unfollow', 'FollowsController@destroy');
    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit');
    Route::put('/profile/{user:username}', 'ProfilesController@update');
    Route::get('/explore', 'ExploreController@index');
    Route::post('/posts/{post}/like', 'PostLikesController@store');
    Route::delete('/posts/{post}/like', 'PostLikesController@destroy');
});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('show');

Auth::routes();

