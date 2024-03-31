<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CatatanController extends Controller
{
    public function index() {
        // $katpemasukan = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'x-api-key' => env('API_KEY'),
        //     'Authorization' => 'Bearer ' . request()->cookie('token')
        // ])->get(env('API_URL')."/kategori_pemasukans");
        // $kat_pemasukan = collect($katpemasukan['data']);
        // dd($kat_pemasukan);
        return view('catatan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);

        // $res = Parent::getDataLogin($request);

        // dd($res['user']['user_id']);
        $apiUrlPemasukan = env('API_URL').'/pemasukans';
        $apiUrlPengeluaran = env('API_URL').'/pengeluarans';
        $apiKey = env('API_KEY');        
        $res = Parent::getDataLogin($request);

        if($request->jenis == 1) {
            $jenis = 'id_kategori_pemasukan';
            $jenisapi = $apiUrlPemasukan;
        }else if ($request->jenis == 2){
            $jenis = 'id_kategori_pengeluaran';
            $jenisapi = $apiUrlPengeluaran;
        }

        $input = array(
            'user_id' => $res['user']['user_id'],
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            $jenis => $request->kategori,
        );
        
        // dd($input);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->post($jenisapi, $input);

        if($response->status() == 200){
            return redirect()->route('loginPage')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('success',$response["message"]);
        }else{
            return back()->with('success',$response["message"]);
        }
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
