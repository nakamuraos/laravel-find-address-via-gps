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

//home
Route::get('/','HomeController@index');
Route::get('/maps','HomeController@maps');

//auth
Route::get('/login','Auth\LoginController@index');
Route::post('/login','Auth\LoginController@login');
Route::get('/register','Auth\RegisterController@index');
Route::post('/register','Auth\RegisterController@register');
Route::get('/logout', 'Auth\LogoutController@logout');

//--------------------------------------------------------------------------
// ADMIN
//--------------------------------------------------------------------------
Route::prefix('admin')->group(function () {
    //address manager
    Route::prefix('address')->group(function () {
        Route::get('/','AddressController@index');
        Route::get('/{id}','AddressController@getAddressDetail');
        Route::put('/{id}','AddressController@update');
        Route::delete('/{id}','AddressController@destroy');
        Route::put('/verify/{id}/{status}','AddressController@changeStatus');
    });
    //user manager
    Route::prefix('user')->group(function () {
        Route::get('/','UserController@index');
    });
});

//--------------------------------------------------------------------------
// USER
//--------------------------------------------------------------------------
Route::prefix('manager')->group(function () {
    //address manager
    Route::prefix('address')->group(function () {
        Route::get('/','AddressController@getAddressInfo');
        Route::put('/{id}','AddressController@update');
        Route::get('/register','AddressController@getRegisterAddress');
        Route::post('/register','AddressController@postRegisterAddress');
        Route::put('/verify/{id}/{status}','AddressController@changeStatus');
    });
    //user manager
    Route::prefix('user')->group(function () {
        Route::get('/','UserController@index');
    });
});

//--------------------------------------------------------------------------
// OTHERS
//--------------------------------------------------------------------------
//change language
Route::get('/welcome/{locale}', 'LanguageController@changeLanguage');
//photos resize
Route::get('/files/photos/{id}', 'ImageController@photo');