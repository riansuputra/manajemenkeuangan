<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class KursController extends Controller
{
    private function getHeaders($request) 
    {
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
            
            return view('kurs.index', [
                'user' => $request->auth['user'],
                'kursData' => $kursData,
                'update' => $update,
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
