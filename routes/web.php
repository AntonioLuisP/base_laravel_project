<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    // Start Needed routes
    Route::get('/auditoria', 'NeededControlls\AuditController@index')->name('audit.index');

    Route::prefix('/permissao')->group(function () {
        Route::get('/', 'NeededControlls\PermissionController@index')->name('permission.index');
        Route::get('/{permission}', 'NeededControlls\PermissionController@show')->name('permission.show');
        Route::prefix('/user')->group(function () {
            Route::get('/{user}/edit', 'NeededControlls\PermissionUserController@edit')->name('permission.user.edit');
            Route::put('/{user}/update', 'NeededControlls\PermissionUserController@update')->name('permission.user.update');
        });
    });
    // End Needed Routes

    //Start other routes
    Route::get('/post/deleted', 'PostController@deleted')->name('post.deleted');
    Route::post('/post/restore/{post}', 'PostController@restore')->name('post.restore');
    Route::resource('post', 'PostController');

    Route::get('/post_theme/deleted', 'PostThemeController@deleted')->name('post_theme.deleted');
    Route::post('/post_theme/restore/{post_theme}', 'PostThemeController@restore')->name('post_theme.restore');
    Route::resource('post_theme', 'PostThemeController')->except("show");
    //End other routes

    // Start basic user routes
    Route::prefix('/user')->group(function () {
        Route::get('/deleted', 'UserController@deleted')->name('user.deleted');
        Route::post('/restore/{user}', 'UserController@restore')->name('user.restore');
        Route::put('/{user}/update/password/', 'UserController@passwordUpdate')->name('user.password.update');
    });
    Route::resource('user', 'UserController')->except(['create', 'store']);
    // End basic user routes
});
