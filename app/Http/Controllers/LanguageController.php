<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
class LanguageController extends Controller
{
    public function switch($lang)
    {
        $lang = in_array($lang, ['en', 'id']) ? $lang : 'en';

        App::setLocale($lang);

        Session::put('locale', $lang);

        return redirect()->back();
    }
}