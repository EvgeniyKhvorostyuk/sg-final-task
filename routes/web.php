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

Route::get('/', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('{username}/home', 'ProfileController@index')->name('home');
Route::get('{username}/profile/create', 'ProfileController@create')->name('profile.create');
Route::post('{username}/profile', 'ProfileController@store')->name('profile.store');
Route::get('{username}/profile/{profile}', 'ProfileController@show')->name('profile.show');

