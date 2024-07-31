<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        // Validate the language
        $lang = in_array($lang, ['en', 'id']) ? $lang : 'en';

        // Set the locale
        App::setLocale($lang);

        // Store the locale in session
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
