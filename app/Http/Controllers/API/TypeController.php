<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class TypeController extends BaseController
{
    //

    public function addressTypes() {
        return $this->sendResponse(__('addresstypes'), 'Address types got successfully.');
    }

    public function filterTypes(Request $request) {
        $type = vnToUnicode($request->input('type'));
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

        return $this->sendResponse((array)$array_types, 'Address types got successfully.');
    }
}
