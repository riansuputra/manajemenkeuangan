<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use \Carbon\Carbon;


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
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/aset'),
        ]);
        // dd($responses[1]->json());
        if ($responses[0]->successful()){
            $asetData = $responses[0]->json()['data']['aset'];
            // dd($portoData);
            return view('portofolio.portofolio', [
                'user' => $request->auth['user'],
                'asetData' => $asetData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('portofolio.portofolio', [
            'user' => $request->auth['user'],
        ]);
    }

    public function make(Request $request)
    {
        return view('portofolio.portofolioril', [
            'user' => $request->auth['user'],
        ]);
    }

    public function histori(Request $request)
    {
        return view('portofolio.histori', [
            'user' => $request->auth['user'],
        ]);
    }

     /**
     * Show the form for creating a new resource.
     */
    public function berita(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/berita'),
        ]);
        // dd($request->auth['user']);

        if ($responses[0]->successful()){
            $beritaData = $responses[0]->json()['data']['berita'];
            // dd($beritaData);
            return view('berita.berita', [
                'user' => $request->auth['user'],
                'beritaData' => $beritaData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function dividen(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/dividen'),
        ]);
        // dd($request->auth['user']);

        if ($responses[0]->successful()){
            $dividenData = $responses[0]->json()['data']['dividen'];
            // dd($dividenData);
            return view('berita.dividen', [
                'user' => $request->auth['user'],
                'dividenData' => $dividenData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['user_id'],
            'volume_beli' => $request->jumlahlembar,
            'tanggal_beli' => $request->tanggal_beli,
            'id_saham' => $request->id_saham,
            'harga_beli' => $request->jumlah1, //avg price
            'harga_total' => $request->avgprice1, //current price
            'pembelian' => '0',
            'id_sekuritas' => '3'
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/portofolio-beli', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

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
