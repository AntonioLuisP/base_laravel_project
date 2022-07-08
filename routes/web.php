<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    // Start sistema routes
    Route::prefix('/sistema')->group(function () {
        Route::get('/', 'SistemaControlls\SistemaController@index')->name('sistema.index');
        Route::get('/auditoria', 'SistemaControlls\AuditController@index')->name('sistema.audit.index');
        Route::prefix('/permissao')->group(function () {
            Route::get('/', 'SistemaControlls\PermissionController@index')->name('sistema.permission.index');
            Route::get('/{permission}', 'SistemaControlls\PermissionController@show')->name('sistema.permission.show');
        });
    });
    // End sistema Routes

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
        Route::put('/{user}/update/permission', 'UserController@permissionUpdate')->name('user.permission.update');
    });
    Route::resource('user', 'UserController');
    // End basic user routes
});
