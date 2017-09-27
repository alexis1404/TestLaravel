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

//Trash CRUD for Customer
Route::get('/customer', 'CustomerController@index');
Route::post('/customer', 'CustomerController@store');
Route::put('/customer', 'CustomerController@update');
Route::delete('/customer', 'CustomerController@delete');
Route::get('/customer/{customer}','CustomerController@getItems')
    ->where('customer', '[0-9]+');

//Mega-Trash CRUD for Items
Route::get('/item', 'ItemController@index');
Route::post('/item', 'ItemController@store');
Route::put('/item', 'ItemController@update');
Route::delete('/item', 'ItemController@delete');
Route::get('/item/{item}', 'ItemController@getCustomer')
    ->where('customer', '[0-9]+');

//Temporary routes
Route::get('/test', 'ItemController@test');
Route::get('/reltest', 'CustomerController@reltest');