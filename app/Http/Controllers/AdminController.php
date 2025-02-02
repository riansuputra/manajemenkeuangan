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
        // dd($request);
        // dd($request->auth['user_type']);

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/permintaan-kategori-admin'),
        ]);

        // dd($responses);
    
        if ($responses[0]->successful()) {
            $permintaan = collect($responses[0]->json()['data']['permintaan'])
                        ->sortByDesc('created_at')
                        ->values()
                        ->all();

            // dd($permintaan);

            return view('admin.kategori.index', [
            'admin' => $request->auth['admin'],

                'permintaan' => $permintaan,
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

    public function reject(Request $request, $id) {
        // dd($id);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/permintaan-kategori/'.$id.'/reject');
        

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
