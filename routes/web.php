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

// HOME
Route::get('/','HomeController@index')->name('home');
Route::get('/maps','HomeController@maps')->name('maps');

// AUTH
Route::get('/login','Auth\LoginController@index')->name('login');
Route::post('/login','Auth\LoginController@login');
Route::get('/register','Auth\RegisterController@index')->name('register');
Route::post('/register','Auth\RegisterController@register');
Route::get('/logout', 'Auth\LogoutController@logout')->name('logout');

//------Profile
Route::get('/user/profile','UserController@getProfile');
Route::put('/user/profile/update','UserController@updateProfile');
//-------Notification
// Route::get('/user/notification','UserController@getNotification');
//--------------------------------------------------------------------------
// MANAGEMENT AREA
//--------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    //--------------------------------------------------------------------------
    // ADMINISTRATOR AREA
    //--------------------------------------------------------------------------
    Route::prefix('admin')->group(function () {
        //address manager
        Route::prefix('address')->middleware('role:addressmanager')->group(function () {
            Route::get('/','AddressController@index');
            Route::get('{id}','AddressController@show');
            Route::put('{id}','AddressController@update');
            Route::delete('{id}','AddressController@destroy');
            Route::put('{id}/verify/{verify_code}','AddressController@changeVerifyCode');
        });
        //manage user
        Route::prefix('user')->middleware('role:admin')->group(function () {
            Route::get('/','UserController@index');
            Route::put('{id}','UserController@update');
            Route::delete('{id}','UserController@destroy');
        });
    });

    //--------------------------------------------------------------------------
    // USER AREA
    //--------------------------------------------------------------------------
    Route::middleware('role:user')->prefix('manager')->group(function () {
        //address manager
        Route::prefix('address')->group(function () {
            Route::get('/','AddressController@getListAddress');
            Route::get('/register','AddressController@create');
            Route::post('/register','AddressController@store');
            Route::get('/{id}','AddressController@showByUser');
            Route::put('/{id}','AddressController@update');
            Route::delete('/{id}','AddressController@destroy');
            // Route::put('/verify/{id}/{status}','AddressController@changeVerifyCode');
        });
        //user manager
        // Route::prefix('user')->group(function () {
        //     Route::get('/','UserController@index');
            
        // });
    });
});

//--------------------------------------------------------------------------
// OTHERS
//--------------------------------------------------------------------------
//change language
Route::get('/welcome/{locale}', 'LanguageController@changeLanguage');
//photos resize
Route::get('/files/photos/{id}', 'ImageController@photo');