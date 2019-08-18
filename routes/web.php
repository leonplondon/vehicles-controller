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

use Illuminate\Support\Facades\Route;

Route::get('/forbidden', 'VehicleController@forbidden')->name('forbidden');

Route::middleware('authenticated')->group(function () {
    Route::get('/register', 'VehicleController@register')->name('register');
    Route::post('/store', 'VehicleController@store')->name('store');
    Route::get('/stats', 'VehicleController@stats')->name('stats');
    Route::get('/vehicles', 'VehicleController@vehicles')->name('vehicles');
});

Route::get('/', 'VehicleController@index')->name('home');
Route::get('/{id}', 'VehicleController@index');
