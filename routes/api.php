<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/restaurants', 'Api\UserController@index');
Route::get('v1/restaurants/search', 'Api\UserController@search');
Route::get('v1/categories', 'Api\CategoryController@index');
