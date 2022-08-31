<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');
        Route::get('/stats', 'HomeController@stats')
            ->name('stats');
        Route::resource('dishes', 'DishController');
        Route::resource('categories', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::get('/edit', 'UserController@my_edit')
            ->name('my_edit');
        Route::resource('orders', 'OrderController');
    });

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
