<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lumpsum(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('investasi.lumpsum', [
            'user' => $res['user'],
        ]);  
    }

    public function bulanan(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('investasi.bulanan', [
            'user' => $res['user'],
        ]);  
    }

    public function target(Request $request)
    {
        $res = Parent::getDataLogin($request);
        return view('investasi.target', [
            'user' => $res['user'],
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