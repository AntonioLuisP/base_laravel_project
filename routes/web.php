<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('post', 'PostController');
    Route::resource('post_theme', 'PostThemeController');
    Route::prefix('/user')->group(function () {
        Route::put('/{user}/update/password/', 'UserController@passwordUpdate')->name('user.password.update');
    });
    Route::resource('user', 'UserController')->except(['create', 'store']);
});
