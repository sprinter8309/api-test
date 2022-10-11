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

Route::group(['prefix' => 'car'], function () {
    Route::get('all', 'ReadController@getAllCars')->name('read.all-cars');
    Route::get('{car_id}', 'ReadController@getCar')->name('read.single-car');
});

Route::group(['prefix' => 'person'], function () {
    Route::get('all', 'ReadController@getAllPersons')->name('read.all-persons');
    Route::get('{person_id}', 'ReadController@getPerson')->name('read.single-person');
});
