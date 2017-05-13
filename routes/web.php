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

Auth::routes();

Route::get('/', 'ProfileController@index')->name('home');


Route::get('{username}/profile/create', 'ProfileController@create')->name('profile.create');
Route::post('{username}/profile', 'ProfileController@store')->name('profile.store');
Route::get('{username}/profile/{profile}', 'ProfileController@show')->name('profile.show');
Route::get('{username}/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('{username}/profile/{profile}', 'ProfileController@update')->name('profile.update');
Route::delete('{username}/profile/{profile}', 'ProfileController@destroy')->name('profile.destroy');

Route::get('profile/{profile}', 'ProfileController@getProfile')->name('profile.getProfile');


