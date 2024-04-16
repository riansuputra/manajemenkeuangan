<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class AnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);
        $alldata = $combinedData->sortByDesc('tanggal');
        
        
        $existingAnggaran = json_decode(request()->input('existingAnggaran', '[]'), true);

        $groupedPengeluaranData = $combinedDataPengeluaran->groupBy('kategori_pengeluaran.id_kategori_pengeluaran')->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            return [
                'id_kategori_pengeluaran' => $items->first()['kategori_pengeluaran']['id_kategori_pengeluaran'],
                'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                'total_jumlah' => $totalJumlah
            ];
        });
        

        // dd($groupedPengeluaranData);

        return view('anggaran.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'groupedPengeluaranData' => $groupedPengeluaranData,
            'kategoriPengeluaranData' => $kategoriPengeluaranData,
            'combinedDataPemasukan' => $combinedDataPemasukan,
            'combinedDataPengeluaran' => $combinedDataPengeluaran,
            'existingAnggaran' => $existingAnggaran,
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
