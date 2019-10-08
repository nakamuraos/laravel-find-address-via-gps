<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLanguage($locale) {
        $locale = substr($locale, 0, 2);
        $str = 'Language has been switched to ' . strtoupper($locale) . ', redirecting...';
        $str .= '<meta http-equiv="refresh" content="2;url=/">';
        $response = new \Illuminate\Http\Response($str);
        $response->withCookie(cookie('locale', $locale, 30 * 84600)); //over 4 years
        return $response;
    }
}
