<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('/user')->group(function () {
        Route::put('/{user}/update/password/', 'UserController@passwordUpdate')->name('user.password.update');
    });
    Route::resource('user', 'UserController')->except(['create', 'store']);
});
