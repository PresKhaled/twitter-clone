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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/discover', 'DiscoverController@index')->name('discover');
    Route::post('/createTweet', 'TweetsController@store');
    Route::post('/u/{username}/toggleFollow', 'FollowsController@store')->name('toggleFollow');
    Route::get('/u/{username}/edit', 'ProfileController@edit')->name('editProfile');
    Route::get('/explore', 'ExploreController')->name('explore');
});

Route::get('/u/{username}', 'ProfileController@index')->name('profile');
