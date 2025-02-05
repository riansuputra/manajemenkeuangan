<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestasiController extends Controller
{
    public function lumpsum(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('investasi.lumpsum', [
            'user' => $request->auth['user'],
            'date' => $date,
        ]);  
    }

    public function bulanan(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('investasi.bulanan', [
            'user' => $request->auth['user'],
            'date' => $date,
        ]);  
    }

    public function targetLumpsum(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('investasi.lumpsum_target', [
            'user' => $request->auth['user'],
            'date' => $date,
        ]);  
    }

    public function targetBulanan(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('investasi.bulanan_target', [
            'user' => $request->auth['user'],
            'date' => $date,
        ]);  
    }
}