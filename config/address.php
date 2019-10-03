<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Address config
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'google_maps_api' => [
      'radius' => 1500, //radius search
      'default_location' => '21.0529562,105.7334937', // HaUI
      'default_type' => 'restaurant'
    ]
];
