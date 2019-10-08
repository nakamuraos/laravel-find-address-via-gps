<?php

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\API\AddressController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Google call api
Route::get('/google/nearbysearch', 'API\GoogleController@nearbysearch');

Route::get('/google/geocoding', 'API\GoogleController@geocoding');

Route::get('/google/geocode', 'API\GoogleController@geocode');

Route::get('/google/findplacefromtext', 'API\GoogleController@findplacefromtext');

Route::get('/google/directions', 'API\GoogleController@directions');

//Responsing config address types
Route::get('/config/addresstypes', 'API\AddressController@addressTypes');
//Responsing config address types from filter
Route::get('/address/types', 'API\AddressController@filterTypes');

Route::get('/insert', function(Request $request) {

});