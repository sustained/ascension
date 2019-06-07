<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/learn/{vue?}', function () {
    return view("learn");
})->where('vue', '[\/\w\.-]*');

Route::group(['prefix' => 'api', 'middleware' => 'ajax'], function () {
    Route::get('/courses', 'APIController@courses');

    Route::get('/courses/{id}', 'APIController@course');

    Route::get('/levels/{id}', 'APIController@levels');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::post('/session', function () {
            return ['not-implemented' => true];
        });
    });
});
