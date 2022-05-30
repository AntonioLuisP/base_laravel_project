<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/audits', 'Audit\AuditController@index')->name('audit.index');
    Route::resource('role', 'Authorization\RoleController');
    Route::resource('permission', 'Authorization\PermissionController')->except(['show']);
    Route::resource('post', 'PostController');
    Route::resource('post_theme', 'PostThemeController')->except("show");
    Route::prefix('/user')->group(function () {
        Route::put('/{user}/update/password/', 'UserController@passwordUpdate')->name('user.password.update');
    });
    Route::resource('user', 'UserController')->except(['create', 'store']);
});
