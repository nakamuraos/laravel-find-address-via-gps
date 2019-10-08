<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class GoogleController extends BaseController
{
    //
    public function nearbysearch(Request $request) {
        $temp = json_decode(\GoogleMaps::load('nearbysearch')
                            ->setParam ([
                                'radius' =>config('address.google_maps_api.radius'),
                                'type'   => $request->input('type'),
                                'keyword'   => $request->input('keyword'),
                                'location'    => $request->input('location')
                            ])
                            ->get());
        return $this->sendResponse($temp->results, $temp->status);
    }

    public function geocoding(Request $request) {
        $temp = json_decode(\GoogleMaps::load('geocoding')
                            ->setParam ([
                                'address'   => $request->input('address'),
                                'latlng'    => $request->input('location')
                            ])
                            ->get());
        return $this->sendResponse($temp->results, $temp->status);
    }

    public function geocode(Request $request) {
        $temp = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.$request->input('location').'&key='.config('googlemaps.key')));
        return $this->sendResponse($temp->results, $temp->status);
    }

    public function findplacefromtext(Request $request) {
        $temp = json_decode(file_get_contents(
            'https://maps.googleapis.com/maps/api/place/findplacefromtext/json?' . 
            'locationbias=circle:'.config('address.google_maps_api.radius') .
            '@'.$request->input('location').
            '&input='.urlencode($request->input('input')) .
            '&inputtype=textquery&fields=photos,formatted_address,name,rating,opening_hours,geometry' . 
            '&key='.config('googlemaps.key')
        ));
        return $this->sendResponse($temp->results, $temp->status);
    }

    public function directions(Request $request) {
        $temp = json_decode(\GoogleMaps::load('directions')
                            ->setParam ([
                                'origin' => $request->input('origin'),
                                'destination'   => $request->input('destination'),
                                'region'   => $request->input('region'),
                            ])
                            ->get());
        return $this->sendResponse($temp->routes, array_key_exists('error_message', $temp) ? $temp->error_message : $temp->status);
    }
}
