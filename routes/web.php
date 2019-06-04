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

use App\Course;
use App\Level;

use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/learn/{vue?}', function () {
    return view("learn");
})->where('vue', '[\/\w\.-]*');

Route::group(['prefix' => 'api'], function () {
    Route::get('/courses', function () {
        return Course::all();
    });

    Route::get('/courses/{course}', function ($id) {
        $load = Input::get('load');
        if ($load && in_array($load, ['levels', 'levels.words']))
            return Course::with(explode(',', $load))->find($id);

        return Course::find($id);
    });

    Route::get('/levels/{level}', function ($id) {
        $load = Input::get('load');
        if ($load && in_array($load, ['course']))
            return Level::with(explode(',', $load))->find($id);

        return Level::find($id);
    });

    Route::post('/session', function () {
        return ['not-implemented' => true];
    });
});
