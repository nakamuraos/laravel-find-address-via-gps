<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Type;

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
        $addresses = '';
        $types = '';
        if (!is_null($request->search)) {
            $name = $request->search; //vnToUnicode($request->keyword);
            $addresses = Address::where('name','like', '%'.$name.'%');
            $types = $this->filterTypes($name);

            if(!is_null($request->location)) {
                $location['lng'] = explode(',', $request->location)[1];
                $location['lat'] = explode(',', $request->location)[0];
                $addresses = $this->scopeIsWithinMaxDistance($addresses, $location, false);
            }
            
            $addresses = $addresses->paginate(21);
            //dd($addresses);
        }

        return view('pages.index', compact('addresses', 'types'));
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
