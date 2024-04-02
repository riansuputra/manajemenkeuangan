<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class CatatanController extends Controller
{
    public function index(Request $request) {
        $res = Parent::getDataLogin($request);

        $pemasukanRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/pemasukans");
        $pemasukanData = collect($pemasukanRes['data'])->where('user_id', $res['user']['user_id']);

        $kategoriPemasukanId = $pemasukanData->pluck('id_kategori_pemasukan')->unique()->toArray();
        $kategoriPemasukanRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/kategori_pemasukans", [
            'id_kategori_pemasukan' => implode(',', $kategoriPemasukanId)
        ]);
        $kategoriPemasukanData = collect($kategoriPemasukanRes['data']);
        $combinedDataPemasukan = $pemasukanData->map(function ($pemasukanItem) use ($kategoriPemasukanData) {
            $relatedKategori = $kategoriPemasukanData->firstWhere('id_kategori_pemasukan', $pemasukanItem['id_kategori_pemasukan']);
            $pemasukanItem['kategori_pemasukan'] = $relatedKategori;
            return $pemasukanItem;
        });

        $pengeluaranRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/pengeluarans");
        $pengeluaranData = collect($pengeluaranRes['data'])->where('user_id', $res['user']['user_id']);
        
        $kategoriPengeluaranId = $pengeluaranData->pluck('id_kategori_pengeluaran')->unique()->toArray();
        $kategoriPengeluaranRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/kategori_pengeluarans", [
            'id_kategori_pengeluaran' => implode(',', $kategoriPengeluaranId)
        ]);
        $kategoriPengeluaranData = collect($kategoriPengeluaranRes['data']);
        $combinedDataPengeluaran = $pengeluaranData->map(function ($pengeluaranItem) use ($kategoriPengeluaranData) {
            $relatedKategori = $kategoriPengeluaranData->firstWhere('id_kategori_pengeluaran', $pengeluaranItem['id_kategori_pengeluaran']);
            $pengeluaranItem['kategori_pengeluaran'] = $relatedKategori;
            return $pengeluaranItem;
        });

        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);
        $alldata = $combinedData->sortByDesc('tanggal');

        
        $perPage = 5; // Number of items per page

        // Paginate the sorted collection
        $finaldata = new Paginator($alldata->forPage(Paginator::resolveCurrentPage(), $perPage), $perPage);

        // dd($combinedData);

        return view('catatan.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'finaldata' => $finaldata,
            'combineDataPemasukan' => $combinedDataPemasukan,
            'combineDataPengeluaran' => $combinedDataPengeluaran,
        ]);
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
            'x-api-key' => $apiKey,
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
