<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        // Validasi bahasa yang dipilih
        $lang = in_array($lang, ['en', 'id']) ? $lang : 'en';

        // Set locale
        App::setLocale($lang);

        // Simpan locale di session
        Session::put('locale', $lang);

        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
