<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Address;
use App\Models\Type;
use Validator;
use Illuminate\Support\Facades\DB;

class AddressController extends BaseController {
  public function index() {
    $addresses = Address::all();

    return $this->sendResponse($addresses->toArray(), 'Address retrieved successfully.');
  }

  public function store(Request $request) {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required',
      'location' => 'required',
      'user_id' => 'required',
      'addresstype_id' => 'required'
    ]);

    if($validator->fails()){
      return $this->sendError('Validation Error.', $validator->errors());       
    }

    $address = Address::create($input);

    return $this->sendResponse($address->toArray(), 'Address created successfully.');
  }

  public function filter(Request $request) {
    $types = Type::where('name','like', '%'.$request->keyword.'%')->first();
    if (is_null($types)) {
      return $this->sendError('Address not found.');
    }
    $address = $types->addresses()->get();

    return $this->sendResponse($address->toArray(), 'Address retrieved successfully.');
  }

  public function search(Request $request) {
    $name = $request->keyword; //vnToUnicode($request->keyword);
    if (is_null($name)) {
      return $this->sendError('Address not found.');
    }
    $address = Address::where('name','like', '%'.$name.'%')->get();

    return $this->sendResponse($address->toArray(), 'Address retrieved successfully.');
  }

  public function nearby(Request $request) {
    $keyword = array_keys($this->filterTypes($request->keyword));
    if (empty($keyword)) {
      return $this->sendError('Address type not found.');
    } else {
      $keyword = $keyword[0];
    }
    $types = Type::where('name','like', '%'.strtolower($keyword).'%')->first();
    if (is_null($types)) {
      return $this->sendError('Address type not found.');
    }
    if (is_null($request->location) || !(strpos($request->location, ',') !== false)) {
      return $this->sendError('Address not found.');
    }
    $location['lng'] = explode(',', $request->location)[1];
    $location['lat'] = explode(',', $request->location)[0];
    $address = $this->scopeIsWithinMaxDistance($types->addresses(), $location)->get();

    return $this->sendResponse($address->toArray(), 'Address retrieved successfully.');
  }

  public function show($id) {
    $address = Address::find($id);

    if (is_null($address)) {
      return $this->sendError('Address not found.');
    }

    return $this->sendResponse($address->toArray(), 'Address retrieved successfully.');
  }

  public function update(Request $request, Addess $address) {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if($validator->fails()){
      return $this->sendError('Validation Error.', $validator->errors());       
    }

    $address->name = $input['name'];
    $address->detail = $input['detail'];
    $address->save();

    return $this->sendResponse($address->toArray(), 'Address updated successfully.');
  }

  public function destroy(Address $address) {
    $address->delete();

    return $this->sendResponse($address->toArray(), 'Address deleted successfully.');
  }
}