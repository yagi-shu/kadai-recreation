<?php

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

Route::get('/', 'RecreationController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('recreation/{id}','RecreationController@show')->name('recreations.show');
Route::get('recreation','RecreationController@popular')->name('recreations.popular');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
         Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    Route::resource('recreations', 'RecreationController',['only' => ['create','store','update','edit','destroy']]);
    Route::resource('users', 'UsersController', ['only' => ['show']]);

    Route::group(['prefix' => 'recreations/{id}'], function () {
            Route::post('favorite', 'FavoriteController@store')->name('favorites.favorite');
            Route::delete('unfavorite', 'FavoriteController@destroy')->name('favorites.unfavorite');
        });
    Route::resource('microposts', 'RecreationController', ['only' => ['store', 'destroy']]);
});