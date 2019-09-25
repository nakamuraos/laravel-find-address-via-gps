<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallApiGoogleMapsController extends Controller
{
    //
    protected $data = [];

    function getNearbySearch($type, $keyword, $location) {
        $tmp = explode(',', $location);
        $lat = $tmp[0];
        $long = $tmp[1];
        return \GoogleMaps::load('nearbysearch')
                    ->setParam([
                        'location'  => [
                                'lat'  => $lat,
                                'lng'  => $long
                        ],
                        'radius'    => 1000,
                        'type'      => $type,
                        'key'       => $keyword
                    ]);
    }
}
