<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use \Carbon\Carbon;

class PortofolioController extends Controller
{
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

    public function mutasiDana(Request $request)
    {
        $filterValue = session('filterValue');
        
        // dd($filterValue);

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/mutasi-dana'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/saldo'),
        ]);
        // dd($responses[1]->json());
        if ($responses[0]->successful() && $responses[1]->successful()){
            $mutasiData = $responses[0]->json()['data']['mutasi_dana'];
            $saldoData = $responses[1]->json()['data']['saldo'];

            $saldo = collect($saldoData)->sum('saldo');

            $currentYear = Carbon::now()->year;
            // $data = $data->whereYear('tahun', $filterValue);
            $selectedYear = $filterValue ?? $currentYear;
            $mutasiDataFilter  = collect($mutasiData)->where('tahun', $selectedYear);
            
            $mutasiDataGrup = collect($mutasiDataFilter)->groupBy('tahun')->toArray();

            $mutasidana = collect($mutasiDataGrup)->filter(function ($items, $year) use ($currentYear) {
                return $year == $currentYear;
                })->map(function ($group) {
                    $group = collect($group);  // Mengubah array menjadi koleksi
                    $firstItem = $group->first();
                
                    return [
                        'harga_unit' => $firstItem['harga_unit'] ?? 0,
                        'modal' => $firstItem['modal'] ?? 0,
                        'jumlah_unit_penyertaan' => $firstItem['jumlah_unit_penyertaan'] ?? 0,
                    ];
            })->toArray();

            $mutasiDataGrup = collect($mutasiDataGrup)->map(function ($items) {
                return collect($items)->groupBy('bulan')->map(function ($monthGroup) {
                    return collect($monthGroup)->map(function ($item) {
                        return [
                            'id' => $item['id'],
                            'user_id' => $item['user_id'],
                            'tahun' => $item['tahun'],
                            'bulan' => $item['bulan'],
                            'modal' => $item['modal'] ?? 0,
                            'harga_unit' => $item['harga_unit'] ?? 0,
                            'harga_unit_saat_ini' => $item['harga_unit_saat_ini'] ?? 0,
                            'jumlah_unit_penyertaan' => $item['jumlah_unit_penyertaan'] ?? 0,
                            'alur_dana' => $item['alur_dana'] ?? 0
                        ];
                    });
                });
            });

            $uniqueYears = collect($mutasiData)
            ->pluck('tahun')  // Ambil semua nilai tahun
            ->unique()        // Hilangkan duplikasi
            ->sort()          // Urutkan
            ->values(); 

            // Tentukan tahun yang digunakan untuk filter
            // $selectedYear = $filterValue ?? $uniqueYears->last(); // Gunakan tahun terakhir jika tidak ada filter
            // dd($uniqueYears);
                        
            // Ambil data bulan terakhir
            $lastMutasiDana = collect($mutasiData)->last();

            return view('portofolio.mutasiDana', [
                'user' => $request->auth['user'],
                'mutasiData' => $mutasiData,
                'mutasiDataGrup' => $mutasiDataGrup,
                'mutasidana' => $mutasidana,
                'saldoData' => $saldoData,
                'saldo' => $saldo,
                'lastMutasiDana' => $lastMutasiDana,
                'uniqueYears' => $uniqueYears,
                'selectedYear' => $selectedYear,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    private function mutasiDateFilter($data, $filterValue) 
    {
        $year = $filterValue;
        $data = $data->whereYear('tahun', $year);
        return ['data' => $data, 'year' => $year];
    }

    public function filter(Request $request)
    {
        $filterValue = $request->input('jenisFilter');
        return redirect()->route('portofolio-mutasi-dana')->with([
            'filterValue' => $filterValue,
        ]);
    }

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

    public function historis(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/historis'),
        ]);
        // dd($responses[0]);

        if ($responses[0]->successful()){
            $historisData = $responses[0]->json()['data']['historis'];
            // dd($beritaData);
            return view('portofolio.historis', [
                'user' => $request->auth['user'],
                'historisData' => $historisData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function berita(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/berita'),
        ]);
        // dd($request->auth['user']);

        if ($responses[0]->successful()){
            $beritaData = $responses[0]->json()['data']['berita'];
            // dd($beritaData);

            $update = collect($beritaData)->sortByDesc('updated_at')->first()['updated_at'] ?? now();
            $update = \Carbon\Carbon::parse($update)->timezone('Asia/Makassar')->format('Y-m-d H:i:s');

            return view('berita.berita', [
                'user' => $request->auth['user'],
                'beritaData' => $beritaData,
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

    public function show(Portofolio $portofolio)
    {
        //
    }

    public function edit(Portofolio $portofolio)
    {
        //
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        //
    }

    public function destroy(Portofolio $portofolio)
    {
        //
    }
}
