<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function filterTypes($type) {
        $type = vnToUnicode($type);
        $addressTypes = __('addresstypes');

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
}
