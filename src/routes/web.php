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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/trips', 'TripsController@index')->name('trips.index');
Route::get('/trips/create', 'TripsController@create')->name('trips.create');
Route::get('/trips/{trip}/edit', 'TripsController@edit')->name('trips.edit');

Route::post('/trips', 'TripsController@store')->name('trips.store');
Route::delete('/trips/{trip}', 'TripsController@destroy')->name('trips.delete');
