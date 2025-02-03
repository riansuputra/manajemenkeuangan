<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class AdminController extends Controller
{
    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->auth['admin']);
        return view('layouts.admin', [
            'admin' => $request->auth['admin'],
        ]);
    }

    public function dashboard(Request $request)
    {
        // dd($request->auth['admin']);
        return view('admin.dashboard.index', [
            'admin' => $request->auth['admin'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function permintaanKategoriAdmin(Request $request)
    {
        // Mengambil data dari API
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/permintaan-kategori-admin'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pribadi'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pengeluaran'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pemasukan'),
        ]);

        // Memeriksa apakah respon berhasil
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful() && $responses[3]->successful()) {
            // Mengambil data permintaan
            $permintaan = collect($responses[0]->json()['data']['permintaan'])
                        ->sortByDesc('created_at')
                        ->values()
                        ->all();

            // Mengambil dan mengubah struktur kategori pribadi
            $kategoriPribadi = collect($responses[1]->json()['data']['kategori_pribadi'])
                ->map(function ($item) {
                    return [
                        'nama_kategori' => $item['nama_kategori'],
                        'tipe' => 'pribadi', // Menandakan tipe kategori pribadi
                        'cakupan' => 'personal', // Cakupan kategori pribadi
                        'created_at' => $item['created_at'] ?? null, // Menambahkan created_at
                    ];
                });

           

            // Mengambil dan mengubah struktur kategori pengeluaran
            $kategoriPengeluaran = collect($responses[2]->json()['data']['kategori_pengeluaran'])
                ->map(function ($item) {
                    $cakupan = 'global';
                    if($item['user_id'] != null) {
                        $cakupan = 'personal';
                    }
                    return [
                        'nama_kategori' => $item['nama_kategori_pengeluaran'], // Pastikan key yang sesuai
                        'tipe' => 'pengeluaran', // Menandakan tipe kategori pengeluaran
                        'cakupan' => $cakupan, // Cakupan kategori pengeluaran
                        'created_at' => $item['created_at'] ?? null, // Menambahkan created_at
                    ];
                });

                 // Mengambil dan mengubah struktur kategori pemasukan
            $kategoriPemasukan = collect($responses[3]->json()['data']['kategori_pemasukan'])
            ->map(function ($item) {
                $cakupan = 'global';
                    if($item['user_id'] != null) {
                        $cakupan = 'personal';
                    }
                return [
                    'nama_kategori' => $item['nama_kategori_pemasukan'], // Pastikan key yang sesuai
                    'tipe' => 'pemasukan', // Menandakan tipe kategori pemasukan
                    'cakupan' => $cakupan, // Cakupan kategori pemasukan
                    'created_at' => $item['created_at'] ?? null, // Menambahkan created_at
                ];
            });

            // Menggabungkan semua kategori
            $allKategori = $kategoriPribadi->merge($kategoriPemasukan)->merge($kategoriPengeluaran);

            // Urutkan berdasarkan created_at secara descending
            $allKategori = $allKategori->sortByDesc('created_at')->values();

            // Menampilkan hasil debug (opsional)
            // dd($allKategori);

            // Menampilkan view dengan data yang telah diproses
            return view('admin.kategori.index', [
                'admin' => $request->auth['admin'],
                'permintaan' => $permintaan,
                'allKategori' => $allKategori, // Menambahkan semua kategori ke dalam view
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }



    public function kurs(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kurs'),
        ]);

        if ($responses[0]->successful()) {
            $kursData = $responses[0]->json()['data']['kurs'];

            $ikonMapping = [
                'AUD' => 'au', 'CAD' => 'ca', 'CHF' => 'ch', 'CNY' => 'cn',
                'EUR' => 'eu', 'GBP' => 'gb', 'HKD' => 'hk', 'INR' => 'in',
                'JPY' => 'jp', 'KRW' => 'kr', 'MYR' => 'my', 'NZD' => 'nz',
                'PHP' => 'ph', 'SGD' => 'sg', 'THB' => 'th', 'USD' => 'us'
            ];

            foreach ($kursData as &$kurs) {
                $parts = explode('(', rtrim($kurs['mata_uang'], ')'));
                $kurs['nama_mata_uang'] = trim($parts[0]); 
                $kurs['kode_mata_uang'] = trim($parts[1] ?? '');
                $kurs['ikon'] = $ikonMapping[$kurs['kode_mata_uang']] ?? 'default';
            }

            $update = collect($kursData)->sortByDesc('updated_at')->first()['updated_at'] ?? now();
            $update = \Carbon\Carbon::parse($update)->timezone('Asia/Makassar')->format('Y-m-d H:i:s');
            
            return view('admin.kurs.index', [
                'admin' => $request->auth['admin'],
                'kursData' => $kursData,
                'update' => $update,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function kursStore(Request $request)
    {
        $response = Http::withHeaders($this->getHeaders($request))->post(env('API_URL') . '/kurs');
        // dd($response->json());
        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('kurs-admin')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else if ($response['status'] == 'warning') {
            return back()->with('warning', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function berita(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/berita'),
        ]);

        if ($responses[0]->successful()) {
            $beritaData = $responses[0]->json()['data']['berita'];

            $beritaData = collect($beritaData)->sortByDesc('tanggal_terbit');

            $update = collect($beritaData)->sortByDesc('updated_at')->first()['updated_at'] ?? now();
            $update = \Carbon\Carbon::parse($update)->timezone('Asia/Makassar')->format('Y-m-d H:i:s');
            
            return view('admin.berita.index', [
                'admin' => $request->auth['admin'],
                'beritaData' => $beritaData,
                'update' => $update,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function beritaStore(Request $request)
    {
        $response = Http::withHeaders($this->getHeaders($request))->get(env('API_URL') . '/berita/store');
        // dd($response->json());
        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('berita-admin')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else if ($response['status'] == 'warning') {
            return back()->with('warning', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function dividen(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/dividen'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/aset'),
        ]);

        if ($responses[0]->successful() && $responses[1]->successful()) {
            $dividenData = $responses[0]->json()['data']['dividen'];
            $asetData = $responses[1]->json()['data']['aset'];

            $asetData = collect($asetData)->filter(function ($aset) {
                return $aset['tipe_aset'] === 'saham';
            })->values();

            $dividenData = collect($dividenData)->sortBy('ex_date')->values()->all();
            $lastUpdate = collect($dividenData)->max('updated_at');
            
            return view('admin.dividen.index', [
                'admin' => $request->auth['admin'],
                'dividenData' => $dividenData,
                'asetData' => $asetData,
                'lastUpdate' => $lastUpdate,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function user(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/user'),
        ]);

        if ($responses[0]->successful()) {
            $userData = $responses[0]->json()['data']['user'];

            return view('admin.user.index', [
                'admin' => $request->auth['admin'],
                'userData' => $userData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    

    public function approve(Request $request, $id) {
        // dd($request, $id);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/permintaan-kategori/'.$id.'/approve');

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('permintaanKategoriAdmin')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function reject(Request $request) {
        // dd($request);

        $input = array(
            'id' => $request->id,
            'message' => $request->message,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/permintaan-kategori/reject', $input);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('permintaanKategoriAdmin')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
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
