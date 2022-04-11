<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/restaurants', 'Api\UserController@index');
Route::get('v1/restaurants/searchCheck', 'Api\UserController@searchCheckbox');
Route::get('v1/restaurants/{slug}', 'Api\UserController@show');

Route::get('v1/categories', 'Api\CategoryController@index');

Route::get('v1/dishes', 'Api\DishController@index');

Route::get('/order/generate', 'Api\PaymentController@generate');
Route::post('/order/make/payment', 'Api\PaymentController@makePayment');
Route::post('/order/save', 'Api\PaymentController@order');


