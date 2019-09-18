<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
        return view('client.login');
    }
    public function getRegister(){
        return view('client.register');
    }
}
