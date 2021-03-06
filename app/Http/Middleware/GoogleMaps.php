<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Address;
use App\Models\Type;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\DB;
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
            \App::setLocale(config('address.google_maps_api.default_language'));
            $this->nearbysearch($request);
        }
        return $next($request);
    }

    public function terminate($request, $response) {
    }

    public function nearbysearch(\Illuminate\Http\Request $request) {
        $temp = json_decode(\GoogleMaps::load('nearbysearch')
                                        ->setParam ([
                                            'radius' => config('address.google_maps_api.radius') + 5000,
                                            'keyword' => $request->input('keyword'),
                                            'type'   => $request->input('keyword'),
                                            'location'    => $request->input('location'),
                                            'language'  => config('address.google_maps_api.default_language')
                                        ])
                                        ->get());
                                        //dd($temp);
        $data = $temp->results;
        if(!empty($data)) {
            foreach($data as $e) {
                $location = $e->geometry->location->lat.','.$e->geometry->location->lng;
                $find = Address::where('location', $location)->first();
                if($find === null) {
                    $photos = null;
                    if(array_key_exists('photos', $e)) {
                        $photos = $this->savePhotos($e->photos);
                    }
                    $address = new Address();
                    $address->name = $e->name;
                    $address->location = $location;
                    if(!empty($photos)) $address->photos=$photos;
                    $address->detail = $e->vicinity;
                    $address->user_id = '1';
                    $address->verified = true;
                    $address->verified_by = "1";
                    $address->verified_time = date('Y-m-d H:i:s');
                    $address->save();

                    DB::table('address_google')->insert(['address_id' => $address->id, 'place_id' => $e->place_id]);

                    if(Type::whereIn('name', $e->types)->get()->count() != count($e->types)) {
                        foreach($e->types as $element) {
                            if(!Type::where('name', $element)->exists()) {
                                $type = new Type();
                                $type->name = $element;
                                $type->save();
                            }
                        }
                    }
                    $types = Type::whereIn('name', $e->types)->get();
                    $address->types()->attach($types);
                    //sync photos and business hours
                    $this->syncPhotosAndBusinessHours($e->place_id, $address);
                }
            }
        }
    }

    public function savePhotos($o) {
        $photos = [];
        //$i = 0;
        foreach($o as $e) {
            //if($i>=5) return $photos;
            $photo_file_name = $e->photo_reference . '.jpeg';
            $path = public_path(config('files.paths.photo').$photo_file_name);
            if(!file_exists($path)) {
                //echo $photo_file_name . "<hr/>";
                $photo = \GoogleMaps::load('placephoto')
                                                ->setParam ([
                                                    'photoreference' => $e->photo_reference,
                                                    'maxwidth' => '10000',
                                                    'maxheight' => '10000',
                                                ])
                                                ->get();
                if($photo) {
                    Image::make($photo)->save($path);
                    $photos[] = $photo_file_name;
                    //$i++;
                }
            } else {
                $photos[] = $photo_file_name;
            }
        }
        return $photos;
    }

    public function syncPhotosAndBusinessHours($place_id, $address) {
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
        if(array_key_exists('photos', $placedetails)) {
            //$photos = $this->savePhotos($placedetails->photos);
        }

        $updates = ['detail' => $placedetails->formatted_address];
        //if(isset($photos)) $updates['photos'] = $photos;//array_unique(array_merge($address->photos, $photos));
        $address->update($updates);
    }
}