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


Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::get('chats', '\App\Http\Controllers\ChatController@index');
<<<<<<< HEAD
    Route::post('chats', '\App\Http\Controllers\ChatController@store');

=======
    Route::get('chats/{id}/messages', '\App\Http\Controllers\MessageController@index');
>>>>>>> More
    Route::post('chats/{id}/messages', '\App\Http\Controllers\MessageController@store');

    Route::get('users/me', '\App\Http\Controllers\UserController@index');
    Route::post('users/me', '\App\Http\Controllers\UserController@update');

});
