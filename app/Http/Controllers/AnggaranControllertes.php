<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class AnggaranControllertes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = $request->auth['user']['user_id'];

        // Fetch all pemasukan and pengeluaran data
        $pemasukanData = $this->fetchAllData('pemasukans', $request);
        $pengeluaranData = $this->fetchAllData('pengeluarans', $request);

        // Fetch kategori data for pemasukan and pengeluaran
        $kategoriPemasukanData = $this->fetchKategoriDataForItems($pemasukanData, 'id_kategori_pemasukan', 'kategori_pemasukans', $request);
        $kategoriPengeluaranData = $this->fetchKategoriDataForItems($pengeluaranData, 'id_kategori_pengeluaran', 'kategori_pengeluarans', $request);

        // Merge kategori data into pemasukan and pengeluaran data
        $combinedDataPemasukan = $this->mergeKategoriData($pemasukanData, $kategoriPemasukanData, 'id_kategori_pemasukan', 'kategori_pemasukan');
        $combinedDataPengeluaran = $this->mergeKategoriData($pengeluaranData, $kategoriPengeluaranData, 'id_kategori_pengeluaran', 'kategori_pengeluaran');

        // Merge filtered pemasukan and pengeluaran data
        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);

        // Filter combined data by user_id
        $alldata = $combinedData->filter(function ($item) use ($user_id) {
            return $item['user_id'] == $user_id;
        });

        // Group and summarize pengeluaran data
        $groupedPengeluaranData = $combinedDataPengeluaran->groupBy('kategori_pengeluaran.id_kategori_pengeluaran')->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            return [
                'id_kategori_pengeluaran' => $items->first()['kategori_pengeluaran']['id_kategori_pengeluaran'],
                'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                'total_jumlah' => $totalJumlah
            ];
        });

        // Other data you might need
        $existingAnggaran = json_decode(request()->input('existingAnggaran', '[]'), true);

        return view('anggaran.index', [
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

// Helper method to fetch data from API and concatenate pages
    private function fetchAllData($endpoint, $request)
    {
        $data = collect();
        $currentPage = 1;

        do {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->get(env('API_URL') . "/$endpoint?page=$currentPage");

            $responseData = $response->json();
            $data = $data->concat($responseData['data']);
            $currentPage++;
        } while ($currentPage <= $responseData['last_page']);

        return $data;
    }

// Helper method to fetch kategori data for items
    private function fetchKategoriDataForItems($items, $idKey, $kategoriEndpoint, $request)
    {
        $kategoriIds = $items->pluck($idKey)->unique()->toArray();

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->get(env('API_URL') . "/$kategoriEndpoint", [
            $idKey => implode(',', $kategoriIds)
        ]);

        return collect($response->json()['data']);
    }

// Helper method to merge kategori data into items
    private function mergeKategoriData($items, $kategoriData, $idKey, $kategoriKey)
    {
        return $items->map(function ($item) use ($kategoriData, $idKey, $kategoriKey) {
            $relatedKategori = $kategoriData->firstWhere($idKey, $item[$idKey]);
            $item[$kategoriKey] = $relatedKategori;
            return $item;
        });
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
