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

        $pemasukanData = collect();
        $pengeluaranData = collect();
        $currentPagePemasukan = 1;
        $currentPagePengeluaran = 1;
        
        do {
            $pemasukanRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . request()->cookie('token')
            ])->get(env('API_URL')."/pemasukans?page=$currentPagePemasukan");
            $dataPemasukan = $pemasukanRes->json();
            $pemasukanData = $pemasukanData->concat($dataPemasukan['data']);
            $currentPagePemasukan++;
        } while ($currentPagePemasukan <= $dataPemasukan['last_page']);

        do {
            $pengeluaranRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . request()->cookie('token')
            ])->get(env('API_URL')."/pengeluarans?page=$currentPagePengeluaran");
            $dataPengeluaran = $pengeluaranRes->json();
            $pengeluaranData = $pengeluaranData->concat($dataPengeluaran['data']);
            $currentPagePengeluaran++;
        } while ($currentPagePengeluaran <= $dataPengeluaran['last_page']);
        
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

        
        $filterPemasukan = [];
        
        foreach ($pemasukanData as $item) {
            $filterPemasukan[] = [
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah']
            ];
        }

        $filterPengeluaran = [];
        
        foreach ($pengeluaranData as $item) {
            $filterPengeluaran[] = [
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah']
            ];
        }
        
        // dd($filterPengeluaran);

        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);
        $alldata = $combinedData->sortByDesc('created_at');

        return view('catatan.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'combinedDataPemasukan' => $combinedDataPemasukan,
            'combinedDataPengeluaran' => $combinedDataPengeluaran,
            'filterPemasukan' => $filterPemasukan,
            'filterPengeluaran' => $filterPengeluaran,

        ]);
    }

    public function getTotalJumlah(Request $request)
{
    // Get the selected date from the request
    $selectedDate = $request->input('selectedDate');

    // Filter the data to include only entries with the selected date
    $filterPemasukan = [];

    foreach ($pemasukanData as $item) {
        if ($item['tanggal'] == $selectedDate) {
            $filterPemasukan[] = [
                'tanggal' => $item['tanggal'],
                'jumlah' => $item['jumlah']
            ];
        }
    }

    // Sum the "jumlah" values from the filtered data
    $totalJumlah = array_sum(array_column($filterPemasukan, 'jumlah'));

    // Return the total jumlah
    return $totalJumlah;
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

        // $unformattednum = $request->jumlah2;
        // dd($unformattednum);

        $input = array(
            'user_id' => $res['user']['user_id'],
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah1,
            'catatan' => $request->catatan,
            $jenis => $request->kategori,
        );
        
        // dd($request);

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
