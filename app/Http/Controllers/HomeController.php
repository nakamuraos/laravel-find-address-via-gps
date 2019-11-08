<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        return view('index');
    }

    public function maps(Request $request){
        $destination = $request->destination;
        $address = '';
        if($destination) {
            $address = Address::where('location', $destination)->first();
        }

        return view('pages.maps', ['address' => $address, 'maps' => true]);
    }
}
