<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    public function bungaTetap(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('pinjaman.bunga_tetap', [
            'date' => $date,
            'user' => $request->auth['user'],
        ]);  
    }

    public function bungaEfektif(Request $request)
    {
        $date = now()->format('d/m/Y');
        return view('pinjaman.bunga_efektif', [
            'date' => $date,
            'user' => $request->auth['user'],
        ]);  
    }
}