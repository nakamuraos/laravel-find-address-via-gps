<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Type;
use Validator;
use Image;
use App\Mail\SendMailActivation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function filterTypes($type) {
        $type = vnToUnicode($type);
        $addressTypes = $this->typesToLocale(Type::all());//__('addresstypes');

        $array_types = array_filter(
            $addressTypes,
            function($value, $key) use ($type) {
                $output = true;
                if(!empty($type)) {
                    if(!(strpos(strtolower(vnToUnicode($value)), strtolower($type)) !== false)) $output = false;
                    if(strpos(preg_replace('/_/is', ' ', $key), strtolower($type)) !== false) $output = true;
                }
                return $output;
            },
            ARRAY_FILTER_USE_BOTH
        );
        asort($array_types);
        return $array_types;
    }

    public function typesToLocale($types) {
        $output = [];
        foreach($types as $key => $value) {
            $output[$value['name']] = \Lang::get('addresstypes.'.$value['name']);
        }
        return $output;
    }

    public function uploadPhotos($request) {
        $photos = [];
        if($request->hasFile('photos')) {
            $rules = [ 'image' => 'image|max:10240' ];
            foreach($request->file('photos') as $photo) {
                $valid = Validator::make(['image' => $photo], $rules);
                if ($valid->fails()) {
                    return redirect()->back()->withErrors($valid)->withInput();
                } else {
                    if ($photo->isValid()) {
                        $filename = time().'_'.rand(1000,9999).'.'.$photo->getClientOriginalExtension();
                        Image::make($photo)->save(public_path(config('files.paths.photo').$filename));
                        $photos[] = $filename;
                    } else {
                        return redirect()->back()->with('error', 'Upload files thất bại!');
                    }
                }
            }
        }
        return $photos;
    }

    public function sendMailActivation($data)
    {
        $obj = new \stdClass();
        $obj->link_activation = route('verify') . '?token=' . $data->verify_token;
        $obj->full_name = $data->full_name;
 
        Mail::to($data->email)->send(new SendMailActivation($obj));
    }

    public function createVerifyToken($str) {
        return substr(Crypt::encryptString(bcrypt($str . rand(1000, 9999))), 30);
    }

    public function scopeIsWithinMaxDistance($query, $location, $limit = true) {
        $haversine = "ST_Distance_Sphere(
                        point(
                        TRIM(SUBSTRING_INDEX(location, ',', -1)),
                        TRIM(SUBSTRING_INDEX(location, ',', 1))
                        ),
                        point(".$location['lng'].", ".$location['lat'].")
                    )";
        $query = $query
                ->select(
                  'id', 
                  'name',
                  'detail',
                  'photos', 
                  'location', 
                  'rate'
                )
                ->selectRaw("{$haversine} AS distance");
        if($limit) $query = $query->whereRaw("{$haversine} < ?", [config('address.google_maps_api.radius')]);
        return $query->orderBy('distance', 'asc');
      }
}