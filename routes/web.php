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

Route::get('/','ClientController@index');
Route::get('/login','LoginController@getLogin');
Route::get('/register','LoginController@getRegister');
Route::get('/manageaddress','AddressController@index');
Route::get('/manageuser','UserController@index');
