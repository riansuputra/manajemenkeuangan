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
        $apiUrPemasukan = env('API_URL').'/pemasukans';
        $apiUrlPengeluaran = env('API_URL').'/pengeluarans';
        $apiKey = env('API_KEY');

        $sks = [1, 2, 3, 4];
        $semester = [1, 2, 3, 4, 5, 6, 7, 8];
        $res = Parent::getDataLogin($request);
        return view('matakuliah.tambah-matakuliah', [
            'user' => $res['user'],
            'keterangan' => $res['keterangan'],
            'sks' => $sks,
            'semester' => $semester,
            'selected_menu' => 'matakuliah',
        ]);

        $katpemasukan = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/kategori_pemasukans");
        $kat_pemasukan = collect($katpemasukan['data']);
        


        $kat_pemasukan;
        $kat_pengeluaran;
        $res = Parent::getDataLogin($request);
        dd($res);
        $input = array(
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'id_kategori_pemasukan' => $request->id_kategori_pemasukan,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->post(env('API_URL')."/pemasukans", $input);
        if($response->status() == 200){
            return redirect()->route('catatan')->with('success','Logout Berhasil');
        }else if(!empty($response["errors"])){
            return back()->with(["toast" => ["type" => "error", "message" => $response["message"]]])->withErrors($response["errors"])->withInput($input);
        }else{
            return back()->with(["toast" => ["type" => "error", "message" => $response["message"]]])->withInput($input);
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
