<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteraddressController extends Controller
{
    public function getRegisterAddress(){
        return view('client.registeraddress');
    }
}
