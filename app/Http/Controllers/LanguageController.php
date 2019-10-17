<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    public function changeLanguage($locale) {
        $locale = substr($locale, 0, 2);
        \App::setLocale($locale);

        $str = __('language.switching', ['locale' => strtoupper($locale)]);
        $str .= '<meta http-equiv="refresh" content="2;url=/">';

        $response = new Response($str);
        $response->withCookie(cookie('locale', $locale, 30 * 84600)); //over 4 years

        return $response;
    }
}
