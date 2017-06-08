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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('users/{id}/edit', 'UsersController@edit');
	Route::put('users/{id}', 'UsersController@update');
	Route::get('kliniks/{id}/create', 'KliniksController@create');
	Route::post('kliniks/{id}/create', 'KliniksController@store');
	Route::get('fasilitas/{id}/create', 'FasilitasController@create');
	Route::get('fasilitas/{id}', 'FasilitasController@show');
	Route::post('fasilitas/{id}', 'FasilitasController@store');
	Route::get('fasilitas/{id}/edit', 'FasilitasController@edit');
	Route::put('fasilitas/{id}', 'FasilitasController@update');
});
