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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout')->name('logout');
    Route::post('register', 'JWTAuthController@register');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::post('reset', 'JWTAuthController@reset');
    Route::post('recovery', 'JWTAuthController@recovery');
    Route::post('me', 'JWTAuthController@me');
});

Route::get('/courses', 'APIController@courses');
