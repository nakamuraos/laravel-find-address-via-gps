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
Route::get('/viewonmaps','ClientController@viewonmaps');
Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('logout', 'LoginController@logout');

Route::get('register','LoginController@getRegister');
Route::get('/manageaddress','AddressController@index');
Route::get('/manageuser','UserController@index');
Route::get('/registeraddress','RegisteraddressController@getregisteraddress');

Route::get('/home', 'HomeController@index')->name('home');

//change language
Route::get('/welcome/{locale}', function ($locale) {
  $locale = substr($locale, 0, 2);
  $str = 'Language has been switched to ' . strtoupper($locale) . ', redirecting...';
  $str .= '<meta http-equiv="refresh" content="2;url=/">';
  $response = new Illuminate\Http\Response($str);
  $response->withCookie(cookie('locale', $locale, 30 * 84600)); //over 4 years
  return $response;
});
