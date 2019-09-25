<?php

use Illuminate\Http\Request;
use App\User;

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
Route::get('/google/nearbysearch', function() {
    print_r(\GoogleMaps::load('nearbysearch'));
});
Route::get('/google/geocoding', function() {
    echo \GoogleMaps::load('geocoding')
                    ->setParam ([
                        'address'   => 'Nha+hang',
                        'latlng'    => '21.0503729,105.7294646'
                    ])
                    ->get();
});
Route::get('/google/geocode', function(Request $request) {
    echo file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$request->input('location').'&key='.env('GOOGLE_MAPS_API_KEY'));
});
Route::get('/google/findplacefromtext', function(Request $request) {
    echo file_get_contents('https://maps.googleapis.com/maps/api/place/findplacefromtext/json?locationbias=circle:5000@'.$request->input('location').'&input='.urlencode($request->input('input')).'&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry&key='.env('GOOGLE_MAPS_API_KEY'));
});