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
Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('logout', 'LoginController@logout');

Route::get('register','LoginController@getRegister');
Route::post('register','LoginController@postRegister');
Route::get('/manageaddress','AddressController@index');
Route::get('/manageuser','UserController@index');
Route::get('/registeraddress','RegisteraddressController@getregisteraddress');

Route::get('/home', 'HomeController@index')->name('home');
