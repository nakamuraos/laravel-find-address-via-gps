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
Route::get('/google/nearbysearch', 'API\GoogleMapsApiController@nearbysearch');

Route::get('/google/geocoding', 'API\GoogleMapsApiController@geocoding');

Route::get('/google/geocode', 'API\GoogleMapsApiController@geocode');

Route::get('/google/findplacefromtext', 'API\GoogleMapsApiController@findplacefromtext');

Route::get('/google/directions', 'API\GoogleMapsApiController@directions');

//Responsing config address types
Route::get('/config/addresstypes', 'API\AddressController@addressTypes');
//Responsing config address types from filter
Route::get('/address/types', 'API\AddressController@filterTypes');

Route::get('/insert', function(Request $request) {
    // DB::table('users')->insert([
    //     "user_name" => "hien98",
    //     "full_name" => "Pham Thi Hien",
    //     "password" =>  bcrypt('123456'),
    //     "phone" => "093284755",
    //     "email" => "hienp9237@gmail.com",
    //     "verified" => true,
    //     "status" => true,
    //     "role_id" => "2",          
    // ]);
});