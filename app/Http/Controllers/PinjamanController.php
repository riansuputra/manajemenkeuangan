<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('pinjaman.index', [
            'user' => $request->auth['user'],
        ]);  
    }

    public function bungaTetap(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('pinjaman.bungaTetap', [
            'user' => $request->auth['user'],
        ]);  
    }

    public function bungaFloating(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('pinjaman.bungaFloating', [
            'user' => $request->auth['user'],
        ]);  
    }

    public function bungaEfektif(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('pinjaman.bungaEfektif', [
            'user' => $request->auth['user'],
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
