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

/* Trips */
Route::prefix('trips')->name('trips.')->group(function() {
	/* Steps */
	Route::prefix('{trip}/steps')->name('steps.')->group(function() {
		// Index
		Route::get('/', 'Api\TripStepsController@index')->name('index');
	});
});