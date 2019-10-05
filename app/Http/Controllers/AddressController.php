<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function index(){
        return view('admin.address.index');
    }
    
    public function registerAddress(){
        return view('client.registeraddress');
    }
}
