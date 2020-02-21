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

Route::get('/home', 'HomeController@index')->name('home');


Route::post('busType', 'BusTypeController@store');
Route::get('showAllBusType','BusTypeController@showAllBusType')->name('showAllBusType');

Route::post('busLayout', 'BusLayoutController@store');
Route::get('showAllLayout', 'BusLayoutController@showAllLayout')->name('showAllLayout');


Route::get('seatLayout', 'SeatLayoutController@index');

Route::post('busSeatEntry','BusSeatController@store')->name('busSeatEntry');

Route::get('busSeat/{id}/Entry','BusSeatController@show')->name('busSeat/Entry');

Route::get('busSeat/{id}/Show', 'BusSeatController@seatShow')->name('busSeat/Show');

Route::get('typeLayout','TypeLayoutController@index')->name('typeLayout');


Route::post('busRegister', 'BusController@store');

Route::get('createBus', 'BusController@index')->name('createBus');

Route::get('showAllBus','BusController@showAllBus')->name('showAllBus');

Route::get('seatEntry/{id}','BusController@show');

//Route::post('busViewDetail/{id}','BusListController@show')->name('busViewDetail');



