<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class TypeController extends BaseController
{
    //

    public function types() {
        return $this->sendResponse(__('addresstypes'), 'Address types got successfully.');
    }

    public function filter(Request $request) {
        $array_types = $this->filterTypes($request->input('type'));
        return $this->sendResponse($array_types, 'Address types got successfully.');
    }
}
