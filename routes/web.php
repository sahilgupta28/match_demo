<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('profile', 'UserController@profile')->name('profile');
Route::put('profile-update', 'UserController@profileUpdate')->name('profile.update');
Route::get('preference', 'PreferenceController@index')->name('preference');
Route::put('preference-update', 'PreferenceController@Update')->name('preference.update');
Route::get('match', 'MatchController@index')->name('match');