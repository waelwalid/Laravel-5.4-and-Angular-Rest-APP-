<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('token_auth', 'Api_AuthenticateController@authenticate');

Route::middleware(['Api_Auth'])->group(function () {

    Route::get('users','Api_userController@index');

    Route::get('user/{id}','Api_userController@show');

    Route::post('user/store','Api_userController@store');

    Route::post('user/update/{id}','Api_userController@update');

    Route::get('user/delete/{id}','Api_userController@destroy');

});



