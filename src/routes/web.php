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

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

/* Trips */
Route::prefix('trips')->name('trips.')->group(function() {
	// Index
	Route::get('/', 'TripsController@index')->name('index');

	// Create
	Route::get('/create', 'TripsController@create')->name('create');
	Route::post('/', 'TripsController@store')->name('store');

	// Edit
	Route::get('/{trip}/edit', 'TripsController@edit')->name('edit');
	Route::patch('/{trip}', 'TripsController@update')->name('update');

	// Delete
	Route::delete('/{trip}', 'TripsController@destroy')->name('delete');

	/* Steps */
	Route::prefix('{trip}/steps')->name('steps.')->group(function() {
		// Create
		Route::post('/', 'TripsController@store')->name('store');
	});
});