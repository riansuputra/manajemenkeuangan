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
        $filterValue = session('filterValue');

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/aset'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/portofolio'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/historis'),
        ]);
        // dd($responses[2]->json());
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful()){
            $asetData = $responses[0]->json()['data']['aset'];
            $portoData = $responses[1]->json()['data']['portofolio'];
            $historisData = $responses[2]->json()['data']['historis'];
            
            $portoData = collect($portoData);

            $filteredAsetData = collect($asetData)->filter(function ($aset) {
                return $aset['tipe_aset'] === 'saham';
            })->values();
            
            $groupedData = $portoData->groupBy(function ($portofolio) {
                $tanggal = $portofolio['kinerja_portofolio']['transaksi']['tanggal'] ?? null;
                return $tanggal ? Carbon::parse($tanggal)->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($portofolio) {
                    return $portofolio['aset']['id'] ?? 'Unknown Aset';
                });
            });

            $sortData = $portoData->groupBy(function ($portofolio) {
                $tanggal = $portofolio['kinerja_portofolio']['transaksi']['tanggal'] ?? null;
                return $tanggal ? Carbon::parse($tanggal)->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($portofolio) {
                    return $portofolio['aset']['id'] ?? 'Unknown Aset';
                })->map(function ($asetGroup) {
                    return $asetGroup->sortByDesc(function ($portofolio) {
                        return Carbon::parse($portofolio['kinerja_portofolio']['transaksi']['tanggal']);
                    })->first();
                });
            });
            
            $currentMonth = Carbon::now()->month; 
            $currentYear = Carbon::now()->year;
            
            $selectedYear = $filterValue ?? $currentYear;
            
            $filteredData = $groupedData->get($selectedYear, collect([])); 
            $sortedData = $sortData->get($selectedYear, collect([])); 

            $filteredHistorisData = collect($historisData)->filter(function ($item) use ($selectedYear) {
                return $item['tahun'] == $selectedYear;
            });

            $sortedHistorisData = $filteredHistorisData->sortByDesc('bulan')->first();

            return view('portofolio.portofolio', [
                'user' => $request->auth['user'],
                'asetData' => $asetData,
                'groupedData' => $groupedData,
                'selectedYear' => $selectedYear,
                'currentMonth' => $currentMonth,
                'filteredData' => $filteredData,
                'sortedData' => $sortedData,
                'filteredAsetData' => $filteredAsetData,
                'sortedHistorisData' => $sortedHistorisData,
                'filteredHistorisData' => $filteredHistorisData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function mutasiDana(Request $request)
    {
        $filterValue = session('filterValue');

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/mutasi-dana'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/saldo'),
        ]);

        if ($responses[0]->successful() && $responses[1]->successful()){
            $mutasiData = $responses[0]->json()['data']['mutasi_dana'];
            $saldoData = $responses[1]->json()['data']['saldo'];

            $saldo = collect($saldoData)->sum('saldo');

            $currentYear = Carbon::now()->year;
            $selectedYear = $filterValue ?? $currentYear;
            $mutasiDataFilter  = collect($mutasiData)->where('tahun', $selectedYear);
            
            $mutasiDataGrup = collect($mutasiDataFilter)->groupBy('tahun')->toArray();

            $mutasidana = collect($mutasiDataGrup)->filter(function ($items, $year) use ($currentYear) {
                return $year == $currentYear;
                })->map(function ($group) {
                    $group = collect($group); 
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
                ->pluck('tahun')  
                ->unique()        
                ->sort()          
                ->values(); 

            $lastMutasiDana = collect($mutasiData)->last();
            $firstMutasiDana = collect($mutasiData)->first();

            return view('portofolio.mutasiDana', [
                'user' => $request->auth['user'],
                'mutasiData' => $mutasiData,
                'mutasiDataGrup' => $mutasiDataGrup,
                'mutasidana' => $mutasidana,
                'saldoData' => $saldoData,
                'saldo' => $saldo,
                'lastMutasiDana' => $lastMutasiDana,
                'firstMutasiDana' => $firstMutasiDana,
                'uniqueYears' => $uniqueYears,
                'selectedYear' => $selectedYear,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function filterMutasi(Request $request)
    {
        $filterValue = $request->input('jenisFilter');

        return redirect()->route('portofolio-mutasi-dana')->with([
            'filterValue' => $filterValue,
        ]);
    }

    public function filterHistoris(Request $request)
    {
        $filterValue = $request->input('jenisFilter');

        return redirect()->route('portofolio-historis')->with([
            'filterValue' => $filterValue,
        ]);
    }

    public function filterPortofolio(Request $request)
    {
        $filterValue = $request->input('jenisFilter');

        return redirect()->route('portofolio')->with([
            'filterValue' => $filterValue,
        ]);
    }

    public function historisStore(Request $request)
    {
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'tahun' => $request->tahun, 
            'bulan' => $request->bulan, 
            'ihsg_start' => $request->ihsgstart1, 
            'ihsg_end' => $request->ihsgend1, 
        );

        $response = Http::withHeaders($this->getHeaders($request))
                        ->post(env('API_URL') . '/historis', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }
    }

    public function historis(Request $request)
    {
        $filterValue = session('filterValue');
        
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/historis'),
        ]);

        if ($responses[0]->successful()) {
            $historisData = $responses[0]->json()['data']['historis'];

            $currentYear = Carbon::now()->year;
            $selectedYear = $filterValue ?? $currentYear;

            $filteredData = collect($historisData)->filter(function ($item) use ($selectedYear) {
                return $item['tahun'] == $selectedYear;
            });

            $groupedByMonth = $filteredData->groupBy('bulan')->map(function ($items) {
                return [
                    'yield' => $items->pluck('yield')->first() ?? '0.00',
                    'yield_ihsg' => $items->pluck('yield_ihsg')->first() ?? 0.00,
                ];
            });

            $resultData = [
                'tahun' => $selectedYear,
                'yield' => $filteredData->pluck('yield')->last() ?? '0.00',
                'yield_ihsg' => $filteredData->pluck('yield_ihsg')->last() ?? '0.00',
                'bulan' => $groupedByMonth,
            ];

            $groupedByYear = collect($historisData)->groupBy(function ($item) {
                return $item['tahun'];
            });

            $historisByYear = $groupedByYear->map(function ($yearGroup) {
                $latestMonth = $yearGroup->sortByDesc('bulan')->first();

                return [
                    'tahun' => $latestMonth['tahun'],
                    'yield' => $latestMonth['yield'] ?? '0.00',
                    'yield_ihsg' => $latestMonth['yield_ihsg'] ?? '0.00',
                ];
            });

            $uniqueYears = collect($historisData)
                ->pluck('tahun')
                ->unique()
                ->sort()
                ->values();

            return view('portofolio.historis', [
                'user' => $request->auth['user'],
                'resultData' => $resultData, 
                'uniqueYears' => $uniqueYears,
                'selectedYear' => $selectedYear,
                'groupedByMonth' => $groupedByMonth,
                'historisByYear' => $historisByYear,
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

        if ($responses[0]->successful()){
            $beritaData = $responses[0]->json()['data']['berita'];

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

        if ($responses[0]->successful()){
            $dividenData = $responses[0]->json()['data']['dividen'];

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
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'volume_beli' => $request->jumlahlembar,
            'tanggal_beli' => $request->tanggal_beli,
            'id_saham' => $request->id_saham,
            'harga_beli' => $request->jumlah1,
            'harga_total' => $request->avgprice1, 
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
