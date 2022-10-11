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
    Route::post('', 'SimpleManageController@createCar')->name('manage.create-car');
    Route::delete('{delete_car_id}', 'SimpleManageController@deleteCar')->name('manage.delete-car');
    Route::put('assign', 'AdvancedManageController@assignPersonToCar')->name('manage.assign-person-to-car');
    Route::put('free', 'AdvancedManageController@freeCarFromPerson')->name('manage.free-car-from-person');
});

Route::group(['prefix' => 'person'], function () {
    Route::post('', 'SimpleManageController@createPerson')->name('manage.create-person');
    Route::delete('{delete_person_id}', 'SimpleManageController@deletePerson')->name('manage.delete-person');
});
