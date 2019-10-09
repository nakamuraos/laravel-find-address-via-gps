<?php

namespace App\Http\Middleware;

use Closure;

class GoogleMaps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        return $next($request);
    }

    private function nearbysearch($request) {
        $temp = json_decode(\GoogleMaps::load('nearbysearch')
                                        ->setParam ([
                                            'radius' =>config('address.google_maps_api.radius'),
                                            'type'   => $request->input('type'),
                                            'keyword'   => $request->input('keyword'),
                                            'location'    => $request->input('location')
                                        ])
                                        ->get());
        
    }
}
