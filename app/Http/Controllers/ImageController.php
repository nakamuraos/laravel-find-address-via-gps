<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Image;

class ImageController extends Controller
{
    public function index(Request $request) {
        return response()->file($request->pathToFile);
    }

    public function photo($id, Request $request) {
        $width = $request->w ? (int)$request->w : null;
        $height = $request->h ? (int)$request->h : null;
        $photo = public_path(config('files.paths.photo').Crypt::decryptString($id));
        if($width || $height) return Image::make($photo)->resize($width, $height)->response();
        return Image::make($photo)->response();
    }
}
