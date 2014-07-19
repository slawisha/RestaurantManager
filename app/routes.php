<?php


Route::get('/', function()
{
	return View::make('index');
});

Route::get('/reservation', 'PagesController@reservation');
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/admin', 'PagesController@admin');
Route::post('/sessions/store', 'SessionsController@store');


Route::group(['prefix' => 'api/v1/'], function()
{
	Route::get('tables', 'TablesController@index');
	Route::get('/auth', 'SessionsController@index');
	Route::post('/reservations/check', 'ReservationsController@check');
	Route::post('/reservations', 'ReservationsController@store');
	Route::get('/reservations', 'ReservationsController@index');
	Route::get('/reservations/{id}', 'ReservationsController@show');
	Route::put('/reservations/{id}', 'ReservationsController@update');
	Route::delete('/reservations/{id}', 'ReservationsController@destroy');
	Route::get('/users', 'UsersController@index');
	Route::get('/users/{id}', 'UsersController@show');
	Route::put('/users/{id}', 'UsersController@update');
	Route::post('/users', 'UsersController@store');
	Route::delete('/users/{id}', 'UsersController@destroy');
});
