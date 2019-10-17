<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Address;
use App\Models\Type;
use App\Models\BusinessHour;
use App\Http\Controllers\API\GoogleController;
use Image;

class GoogleMaps extends GoogleController {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if($request->keyword != "" && $request->location != "" && $request->depth != "") {
            $this->nearbysearch($request);
        }
        return $next($request);
    }

    public function terminate($request, $response) {
    }

    public function nearbysearch($request) {
        $temp = json_decode(\GoogleMaps::load('nearbysearch')
                                        ->setParam ([
                                            'radius' => config('address.google_maps_api.radius') + 5000,
                                            'type'   => $request->input('keyword'),
                                            'keyword'   => $request->input('keyword'),
                                            'location'    => $request->input('location'),
                                            'language'  => config('address.google_maps_api.default_language')
                                        ])
                                        ->get());
                                        //dd($temp);
        $data = $temp->results;
        if(!empty($data)) {
            foreach($data as $e) {
                $location = $e->geometry->location->lat.','.$e->geometry->location->lng;
                $find = Address::where('location', $location)->exists();
                if(!$find) {
                    if(array_key_exists('photos', $e)) {
                        $photos = $this->savePhotos($e->photos);
                    }
                    $types = Type::whereIn('name', $e->types)->get();
                    $address = new Address();
                    $address->name = $e->name;
                    $address->location = $location;
                    if(isset($photos)) $address->photos=$photos;
                    $address->detail = $e->vicinity;
                    $address->user_id = '1';
                    $address->verified = true;
                    $address->verified_by = "1";
                    $address->verified_time = date('Y-m-d H:i:s');
                    $address->save();
                    if($types->count() > 0) {
                        $address->types()->attach($types);
                    }
                    if(array_key_exists('opening_hours', $e) && !empty($e->opening_hours)) {
                        $this->syncBusinessHours($e->place_id, $address);
                    }
                }
            }
        }
    }

    public function savePhotos($o) {
        $photos = [];
        foreach($o as $e) {
            $photo_file_name = $e->photo_reference . '.jpeg';
            $photos[] = $photo_file_name;
            $path = public_path(config('files.paths.photo').$photo_file_name);
            if(!file_exists($path)) {
                $photo = \GoogleMaps::load('placephoto')
                                                ->setParam ([
                                                    'photoreference' => $e->photo_reference,
                                                    'maxwidth' => '10000',
                                                    'maxheight' => '10000',
                                                ])
                                                ->get();
                Image::make($photo)->save($path);
            }
        }
        return $photos;
    }

    public function syncBusinessHours($place_id, $address) {
        $temp = json_decode(\GoogleMaps::load('placedetails')
                                        ->setParam ([
                                            'placeid' => $place_id,
                                        ])
                                        ->get());
        $placedetails = $temp->result;
        if(array_key_exists('opening_hours', $placedetails)) {
            $opening_hours = $placedetails->opening_hours->periods;
            $hours = [];
            foreach($opening_hours as $hour) {
                $hours[] =  new BusinessHour([
                    'dayofweek' => $hour->open->day,
                    'open_time' => $hour->open->time,
                    'close_time' => array_key_exists('close', $hour) ? $hour->close->time : '0000',
                ]);
            }
            $address->business_hours()->saveMany($hours);
        }
        $address->update(['detail'=>$placedetails->formatted_address]);
    }
}