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
Route::prefix('google')->group(function () {
    Route::get('nearbysearch', 'API\GoogleController@nearbysearch');
    Route::get('geocoding', 'API\GoogleController@geocoding');
    Route::get('geocode', 'API\GoogleController@geocode');
    Route::get('findplacefromtext', 'API\GoogleController@findplacefromtext');
    Route::get('directions', 'API\GoogleController@directions');
});
//Responsing config address types from filter
Route::prefix('address')->group(function () {
    Route::get('types', 'API\TypeController@filterTypes');
    Route::get('list', 'API\AddressController@filter');
});
//Responsing config address types
Route::get('/config/addresstypes', 'API\TypeController@addressTypes');

Route::get('/insert', function(Request $request) {

});