<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('users/login', '\App\Api\Controllers\AuthController@authenticate');
Route::post('users/register', '\App\Api\Controllers\AuthController@register');

Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::get('users/me', '\App\Http\Controllers\UserController@index');
    Route::post('users/me', '\App\Http\Controllers\UserController@update');
});
