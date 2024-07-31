<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;


class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }
    public function portofolio(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/saham'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/portofolio-beli')
        ]);
        // dd($responses[1]->json());
        if ($responses[0]->successful() && $responses[1]->successful()){
            $sahamData = $responses[0]->json()['data']['saham'];
            $portoData = $responses[1]->json()['data']['portofolioBeli'];
            // dd($portoData);
            return view('portofolio.portofolio', [
                'user' => $request->auth['user'],
                'sahamData' => $sahamData,
                'portoData' => $portoData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
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
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        //
    }
}
