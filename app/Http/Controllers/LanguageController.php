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
        // Validasi bahasa
        $lang = in_array($lang, ['en', 'id']) ? $lang : 'en';

        // Set locale
        App::setLocale($lang);

        // Simpan locale dalam session
        Session::put('locale', $lang);

        // Debugging, pastikan locale tersimpan
        Log::info('Locale setelah switch: ' . session('locale'));
        // dd(session('locale')); // Ini untuk memastikan bahwa session di-set dengan benar
        // dd(app()->getLocale());  // Periksa locale yang aktif

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

}
