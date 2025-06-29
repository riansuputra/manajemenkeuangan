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
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/mutasi-dana'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kinerja-portofolio'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/transaksi'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/sekuritas'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/aset-harga'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/tutup-buku'),
        ]);

        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful() && $responses[3]->successful() 
            && $responses[4]->successful() && $responses[5]->successful() && $responses[6]->successful() && $responses[7]->successful() 
            && $responses[8]->successful()){
            $asetData = $responses[0]->json()['data']['aset'];
            $portoData = $responses[1]->json()['data']['portofolio'];
            $historisData = $responses[2]->json()['data']['historis'];
            $mutasiData = $responses[3]->json()['data']['mutasi'];
            $kinerjaData = $responses[4]->json()['data']['kinerja'];
            $transaksiData = $responses[5]->json()['data']['transaksi'];
            $sekuritasData = $responses[6]->json()['data']['sekuritas'];
            $hargaData = $responses[7]->json()['data']['harga'];
            $tutupData = $responses[8]->json()['data']['tutup_buku'];

            $portoData = collect($portoData);
            $hargaData = collect($hargaData);
            $transaksiData = collect($transaksiData);
            $mutasiData = collect($mutasiData);
            $tutupData = collect($tutupData);
            // dd($tutupData);
            // dd($portoData);

            if ($tutupData->isNotEmpty()) {
                $tahunTerakhir = (int) $tutupData->max('tahun');
                $tahunBerikutnya = $tahunTerakhir + 1;
            } else {
                $tahunBerikutnya = now()->year; // fallback: tahun sekarang
            }

            $sortHargaData = $hargaData->groupBy(function ($item) {
                return $item['aset']['id'] ?? 'Unknown Aset';
            })->map(function ($group) {
                return $group->sortBy('created_at')->values();
            });

            // dd($sortHargaData);

            $filteredAsetData = collect($asetData)->filter(function ($aset) {
                return $aset['tipe_aset'] === 'saham';
            })->values();
            
            $groupedData = $mutasiData->groupBy(function ($portofolio) {
                $tanggal = $portofolio['tahun'] ?? null;
                return $tanggal ? $tanggal : 'Unknown Year';
            });

            // dd($groupedData);

            $groupedDataTranJual = $transaksiData->groupBy(function ($transaksi) {
                $tanggal = $transaksi['tanggal'] ?? null;
                return $tanggal ? Carbon::parse($tanggal)->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($transaksi) {
                    return $transaksi['aset']['id'] ?? 'Unknown Aset';
                })->map(function ($group) {
                    return $group->filter(function ($transaksi) {
                        return $transaksi['jenis_transaksi'] === 'jual'; // Filter hanya transaksi jual
                    })->map(function ($transaksi) {
                        // Tambahkan perhitungan baru
                        $modal = $transaksi['volume'] * $transaksi['avg_price'];
                        $hasilJual = $transaksi['volume'] * $transaksi['harga'];
                        $pl = $hasilJual - $modal;
            
                        // Tambahkan ke dalam array transaksi
                        $transaksi['modal'] = $modal;
                        $transaksi['hasil_jual'] = $hasilJual;
                        $transaksi['p/l'] = $pl;
            
                        return $transaksi;
                    })->values(); // Reset array keys
                })->filter(function ($group) {
                    return $group->isNotEmpty(); // Hapus grup kosong (aset yang tidak punya transaksi jual)
                });
            })->filter(function ($yearGroup) {
                return $yearGroup->isNotEmpty(); // Hapus tahun yang tidak memiliki transaksi jual
            });

            $groupedDataTran = $transaksiData->groupBy(function ($transaksi) {
                $tanggal = $transaksi['tanggal'] ?? null;
                return $tanggal ? Carbon::parse($tanggal)->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($transaksi) {
                    return $transaksi['aset']['id'] ?? 'Unknown Aset';
                })->map(function ($group) {
                    return $group->map(function ($transaksi) {
                        // Tambahkan perhitungan baru
                        $modal = $transaksi['volume'] * $transaksi['avg_price'];
                        $hasilJual = $transaksi['volume'] * $transaksi['harga'];
                        $pl = $hasilJual - $modal;
            
                        // Tambahkan ke dalam array transaksi
                        $transaksi['modal'] = $modal;
                        $transaksi['hasil_jual'] = $hasilJual;
                        $transaksi['p/l'] = $pl;
            
                        return $transaksi;
                    })->values(); // Reset array keys
                })->filter(function ($group) {
                    return $group->isNotEmpty(); // Hapus grup kosong
                });
            });
            
            
            

            
            $sortDataTranJual = $transaksiData
                ->groupBy(function ($transaksi) {
                    return $transaksi['aset']['id'] ?? 'Unknown Aset';
                })
                ->map(function ($group) {
                    return $group->filter(function ($transaksi) {
                        return $transaksi['jenis_transaksi'] === 'jual';
                    })->map(function ($transaksi) {
                        // Tambahkan perhitungan baru
                        $modal = $transaksi['volume'] * $transaksi['avg_price'];
                        $hasilJual = $transaksi['volume'] * $transaksi['harga'];
                        $pl = $hasilJual - $modal;

                        // Tambahkan ke dalam array transaksi
                        $transaksi['modal'] = $modal;
                        $transaksi['hasil_jual'] = $hasilJual;
                        $transaksi['p/l'] = $pl;

                        return $transaksi;
                    })->values(); // Reset array keys
                })->filter(function ($group) {
                    return $group->isNotEmpty(); // Hapus grup kosong
                });

            // dd($sortDataTranJual);

            // dd($portoData);

            $sortData = $portoData->groupBy(function ($portofolio) {
                return $portofolio['aset']['id'] ?? 'Unknown Aset';
            })->map(function ($asetGroup) {
                return $asetGroup->sortByDesc(function ($portofolio) {
                    return Carbon::parse($portofolio['kinerja_portofolio_id']);
                })->first();
            });

            // dd($sortData);
            
            
            $currentMonth = Carbon::now()->month; 
            $currentYear = Carbon::now()->year;
            
            $selectedYear = $filterValue ?? $tahunBerikutnya;
            
            $filteredData = $groupedData->get($selectedYear, collect([])); 
            // $firstSortedData = $sortData->get($selectedYear, collect([])); 
            $filteredDataTran = $groupedDataTran->get($selectedYear, collect([])); 
            $filteredDataTranJual = $groupedDataTranJual->get($selectedYear, collect([])); 

        

            $filteredHistorisData = collect($historisData)->filter(function ($item) use ($selectedYear) {
                return $item['tahun'] == $selectedYear;
            });

            $sortedHistorisData = $filteredHistorisData->sortByDesc('bulan')->first();

            $mutasiDataFilter  = collect($mutasiData)->where('tahun', $selectedYear)->last();

            $tahunKinerja = collect($kinerjaData)->last();
            $filteredKinerjaData = collect($kinerjaData)->filter(function ($item) use ($selectedYear) {
                $tanggalKinerja = $item['transaksi']['tanggal'];
                $tahunKinerja = date('Y', strtotime($tanggalKinerja));
                return $item ? $tahunKinerja == $selectedYear : 'Unknown Year';
            });
            // dd($filteredKinerjaData);

            $kinerjaDataFilter  = collect($filteredKinerjaData)->last();

            // dd($sortData['1']);

            $sortedData = $sortData->map(function ($item) {
                
                $volume = $item['volume'];
                $avgPrice = $item['avg_price'] ?? $item['cur_price'];
                $curPrice = $item['cur_price'] ?? 0;
    
                $modal = $volume * $avgPrice;
                $valuasi = $volume * $curPrice;
                $profitLoss = $valuasi - $modal;
                $profitLossPercent = $modal > 0 ? round(($profitLoss / $modal) * 100, 2) : 0;
    
                // Tambahkan informasi baru ke dalam data
                $item['modal'] = $modal;
                $item['valuasi'] = $valuasi;
                $item['p/l'] = $profitLoss;
                $item['p/l%'] = $profitLossPercent;
    
                return $item;
            });

            // dd($sortData);
            // dd($selectedYear);


            // Hitung Total Modal dan Valuasi untuk Fund Alloc dan Value Effect
            $totalModal = $sortedData->sum('modal');
            $totalValuasi = $sortedData->sum('valuasi');

            $sortedData = $sortedData->map(function ($item) use ($totalModal, $totalValuasi) {
                $modal = $item['modal'];
                $valuasi = $item['valuasi'];
            
                // Fund Allocation dan Value Effect
                $fundAlloc = $totalModal > 0 ? ($modal / $totalModal) * 100 : 0;
                $valueEffect = $totalValuasi > 0 ? ($valuasi / $totalValuasi) * 100 : 0;
            
                $item['fund_alloc'] = $fundAlloc;
                $item['value_effect'] = $valueEffect;
            
                return $item;
            });

            // dd($filteredData);
            // dd($sortData, $sortedData, $filteredData, $filteredDataTran, $filteredDataTranJual);
            $date = now()->format('d/m/Y');
            

            return view('portofolio.portofolio', [
                'user' => $request->auth['user'],
                'asetData' => $asetData,
                'date' => $date,
                'groupedData' => $groupedData,
                'selectedYear' => $selectedYear,
                'currentMonth' => $currentMonth,
                'filteredData' => $filteredData,
                'sortedData' => $sortedData,
                'filteredAsetData' => $filteredAsetData,
                'sortedHistorisData' => $sortedHistorisData,
                'filteredHistorisData' => $filteredHistorisData,
                'mutasiDataFilter' => $mutasiDataFilter,
                'kinerjaDataFilter' => $kinerjaDataFilter,
                'filteredDataTran' => $filteredDataTran,
                'filteredDataTranJual' => $filteredDataTranJual,
                'sekuritasData' => $sekuritasData,
                'sortHargaData' => $sortHargaData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function mutasiDana(Request $request)
    {
        $filterValue = session('filterValue');
        $date = now()->format('d/m/Y');

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/mutasi-dana'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/saldo'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/portofolio'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/aset'),
        ]);
        // dd($responses[0]->json() , $responses[1]->successful() , $responses[2]->successful() , $responses[3]->successful());
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful() && $responses[3]->successful()){
            $mutasiData = $responses[0]->json()['data']['mutasi'];
            $saldoData = $responses[1]->json()['data']['saldo'];
            $portoData = $responses[2]->json()['data']['portofolio'];
            $asetData = $responses[3]->json()['data']['aset'];
            

            $portoData = collect($portoData);

            $filteredAsetData = collect($asetData)->filter(function ($aset) {
                return $aset['tipe_aset'] === 'saham';
            })->values();

            // dd($filteredAsetData);

            $sortData = $portoData->groupBy(function ($portofolio) {
                $tanggal = $portofolio['kinerja_portofolio']['transaksi']['tanggal'] ?? null;
                return $tanggal ? Carbon::parse($tanggal)->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($portofolio) {
                    return $portofolio['aset']['id'] ?? 'Unknown Aset';
                })->map(function ($asetGroup) {
                    return $asetGroup->sortByDesc(function ($portofolio) {
                        return Carbon::parse($portofolio['kinerja_portofolio']['transaksi']['updated_at']);
                    })->first();
                });
            });

            // dd($sortData);

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
            $firstMutasiDana = collect($mutasiData)
                ->where('tahun', $selectedYear)
                ->sortBy('updated_at') // atau sortByDesc() jika ingin latest
                ->first();
            // dd($firstMutasiDana);

            return view('portofolio.mutasi_dana', [
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
                'sortData' => $sortData,
                'date' => $date,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
        
    }

    public function filterMutasi(Request $request)
    {
        $filterValue = $request->input('jenisFilter');

        return redirect()->route('portofolio.mutasi.dana')->with([
            'filterValue' => $filterValue,
        ]);
    }

    public function filterHistoris(Request $request)
    {
        $filterValue = $request->input('jenisFilter');

        return redirect()->route('portofolio.historis')->with([
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
        $date = now()->format('d/m/Y');

        $filterValue = session('filterValue');
        
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/historis'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/transaksi'),
        ]);

        if ($responses[0]->successful() && $responses[1]->successful()){ 
            $historisData = $responses[0]->json()['data']['historis'];
            $transaksiData = $responses[1]->json()['data']['transaksi'];

            $transaksiData = collect($transaksiData);
            $groupedDataTranJual = $transaksiData->groupBy(function ($transaksi) {
                // Grup berdasarkan Tahun
                return $transaksi['tanggal'] ? Carbon::parse($transaksi['tanggal'])->year : 'Unknown Year';
            })->map(function ($yearGroup) {
                return $yearGroup->groupBy(function ($transaksi) {
                    // Grup berdasarkan Bulan
                    return $transaksi['tanggal'] ? Carbon::parse($transaksi['tanggal'])->format('Y-m') : 'Unknown Month';
                })->map(function ($monthGroup) {
                    // Hitung total modal, net realisasi, profit, loss, dan yield per bulan
                    $total_modal_terjual = $monthGroup->sum(function ($transaksi) {
                        return $transaksi['volume'] * $transaksi['avg_price'];
                    });
            
                    $net_realisasi = $monthGroup->sum(function ($transaksi) {
                        return ($transaksi['volume'] * $transaksi['harga']) - ($transaksi['volume'] * $transaksi['avg_price']);
                    });
            
                    $total_profit_realisasi = $monthGroup->filter(function ($transaksi) {
                        return (($transaksi['volume'] * $transaksi['harga']) - ($transaksi['volume'] * $transaksi['avg_price'])) > 0;
                    })->sum(function ($transaksi) {
                        return ($transaksi['volume'] * $transaksi['harga']) - ($transaksi['volume'] * $transaksi['avg_price']);
                    });
            
                    $total_loss_realisasi = $monthGroup->filter(function ($transaksi) {
                        return (($transaksi['volume'] * $transaksi['harga']) - ($transaksi['volume'] * $transaksi['avg_price'])) < 0;
                    })->sum(function ($transaksi) {
                        return ($transaksi['volume'] * $transaksi['harga']) - ($transaksi['volume'] * $transaksi['avg_price']);
                    });
            
                    $yield_realisasi = $total_modal_terjual > 0 ? ($net_realisasi / $total_modal_terjual) * 100 : 0;
            
                    return [
                        'total_modal_terjual' => number_format($total_modal_terjual, 2, ',', '.'),
                        'net_realisasi' => number_format($net_realisasi, 2, ',', '.'),
                        'total_profit_realisasi' => number_format($total_profit_realisasi, 2, ',', '.'),
                        'total_loss_realisasi' => number_format($total_loss_realisasi, 2, ',', '.'),
                        'yield_realisasi' => number_format($yield_realisasi, 2, ',', '.'),
                    ];
                })->put('total_tahun', function ($monthData) {
                    // Hitung total keseluruhan dalam tahun yang sama
                    $total_modal_tahun = collect($monthData)->sum('total_modal_terjual');
                    $net_realisasi_tahun = collect($monthData)->sum('net_realisasi');
                    $total_profit_tahun = collect($monthData)->sum('total_profit_realisasi');
                    $total_loss_tahun = collect($monthData)->sum('total_loss_realisasi');
                    $yield_tahun = $total_modal_tahun > 0 ? ($net_realisasi_tahun / $total_modal_tahun) * 100 : 0;
            
                    return [
                        'total_modal_terjual' => number_format($total_modal_tahun, 2, ',', '.'),
                        'net_realisasi' => number_format($net_realisasi_tahun, 2, ',', '.'),
                        'total_profit_realisasi' => number_format($total_profit_tahun, 2, ',', '.'),
                        'total_loss_realisasi' => number_format($total_loss_tahun, 2, ',', '.'),
                        'yield_realisasi' => number_format($yield_tahun, 2, ',', '.'),
                    ];
                });
            });
            

            $currentYear = Carbon::now()->year;
            $selectedYear = $filterValue ?? $currentYear;

            $filteredDataTranJual = $groupedDataTranJual->filter(function ($_, $year) use ($selectedYear) {
                return $year == $selectedYear;
            });

            

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

            // dd($groupedByMonth);

            return view('portofolio.historis', [
                'user' => $request->auth['user'],
                'resultData' => $resultData, 
                'uniqueYears' => $uniqueYears,
                'selectedYear' => $selectedYear,
                'groupedByMonth' => $groupedByMonth,
                'historisByYear' => $historisByYear,
                'date' => $date,
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
            $beritaData = collect($beritaData)->sortByDesc('tanggal_terbit');

            $update = collect($beritaData)->sortByDesc('updated_at')->first()['updated_at'] ?? now();
            $update = \Carbon\Carbon::parse($update)->timezone('Asia/Makassar')->format('Y-m-d H:i:s');

            return view('berita.index', [
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
        // dd($request);
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

    public function updateHarga(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'id_aset' => $request->id_aset,
            'updateHarga1' => $request->updateHarga1,
            'tanggal_harga' => $request->tanggal_harga,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/update-price', $input);

        if($response->status() == 200){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

    }

    public function store(Request $request)
    {
        $jenisTransaksi = $request->input('jenis_transaksi');

        if ($jenisTransaksi === 'beli') {
            return $this->storeBeli($request);
        } elseif ($jenisTransaksi === 'jual') {
            return $this->storeJual($request);
        } elseif ($jenisTransaksi === 'dividen') {
            return $this->storeKeluar($request);
        }

        return response()->json([
            'auth' => $request->auth,
            'status' => 'error',
            'message' => 'Jenis Transaksi tidak valid.',
        ], 400);
    }

    private function storeBeli(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'volume' => $request->jumlahlembar1,
            'tanggal' => $request->tanggal,
            'id_saham' => $request->id_saham,
            'harga' => $request->jumlah1,
            'jenis_transaksi' => $request->jenis_transaksi,
            'aset_id' => $request->id_saham,
            'sekuritas' => $request->sekuritas,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/transaksi', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

    }

    private function storeJual(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'volume' => $request->jumlahlembar1,
            'tanggal' => $request->tanggal,
            'harga' => $request->jumlah1,
            'jenis_transaksi' => $request->jenis_transaksi,
            'aset_id' => $request->id_saham,
            'sekuritas' => $request->sekuritas,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/store-jual', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

    }

    public function updateHargaReal(Request $request)
    {
        // dd($request);
        try {
            $request->validate([
                'id_aset' => 'required',
                'nama_aset' => 'required',
                'tipe' => 'nullable',
            ]);
            $response = Http::acceptJson()
                ->withHeaders([
                    'X-API-KEY' => config('goapi.apikey')
                ])->withoutVerifying()->get('https://api.goapi.io/stock/idx/prices?symbols='.$request->nama_aset)->json();
            
            if($response['status'] == 'success'){
                // $this->updateAuthCookie($request->auth, $response['auth']);
                if(!empty($response['data']['results'])) {
                    $hargaTerkini = $response['data']['results'][0]['close'];
                    $idAset = $request->id_aset;
                    $tipe = $request->tipe;
                    // dd($tipe);
                    if($tipe == 'portofolio') {
                        return redirect()->route('portofolio')->with('success',$response["message"])->with('id_aset', $idAset)->with('open_modal', 'portofolio')->with('harga_terkini', $hargaTerkini);
                    } else if($tipe == 'ihsg') {
                        return redirect()->route('portofolio')->with('success',$response["message"])->with('open_modal', 'ihsg')->with('harga_terkini', $hargaTerkini);
                    } else {
                        return redirect()->route('portofolio')->with('success',$response["message"])->with('open_modal', $idAset)->with('harga_terkini', $hargaTerkini);
                    }
                } else {
                    $hargaTerkini = 0;
                    $idAset = $request->id_aset;
                    // dd($idAset);
                    return redirect()->route('portofolio')->with('error', "Data harga terkini belum tersedia")->with('open_modal', $idAset)->with('harga_terkini', $hargaTerkini);
                }
            }else if(!empty($response["errors"])){
                return back()->with('error',$response["message"]);
            }else{
                return back()->with('error',$response["message"]);
            }
        } catch (Exception $e) {
            if ($e instanceof ValidationException) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'auth' => $request->auth,
                    'errors' => $e->validator->errors(),
                ], Response::HTTP_BAD_REQUEST);
            } else {
                Log::error('Error in index method: ' . $e->getMessage());
                return response()->json([
                    'message' => $e->getMessage(),
                    'auth' => $request->auth
                ], Response::HTTP_BAD_REQUEST);
            }
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

    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $jenisTransaksi = $request->input('jenis_transaksi');

        if ($jenisTransaksi === 'beli') {
            return $this->updateBeli($request);
        } elseif ($jenisTransaksi === 'jual') {
            return $this->updateJual($request);
        } elseif ($jenisTransaksi === 'dividen') {
            return $this->storeKeluar($request);
        }

        return response()->json([
            'auth' => $request->auth,
            'status' => 'error',
            'message' => 'Jenis Transaksi tidak valid.',
        ], 400);
    }

    private function updateBeli(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'volume' => $request->lembaredit1,
            'tanggal' => $request->tanggal,
            'id_transaksi' => $request->id,
            'harga' => $request->jumlahedit1,
            'jenis_transaksi' => $request->jenis_transaksi,
            'aset_id' => $request->aset_id,
            'sekuritas' => $request->sekuritas,
        );
        // dd($input, $request);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/updateBeli', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

    }

    private function updateJual(Request $request)
    {
        // dd($request);
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'volume' => $request->jumlahlembar1,
            'tanggal' => $request->tanggal,
            'harga' => $request->jumlah1,
            'jenis_transaksi' => $request->jenis_transaksi,
            'aset_id' => $request->id_saham,
            'sekuritas' => $request->sekuritas,
        );
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/updateJual', $input);

        if($response->status() == 201){
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('error',$response["message"]);
        }else{
            return back()->with('error',$response["message"]);
        }

    }

    public function destroy(Request $request, $id)
    {
        // dd($request, $id);
        $response = Http::withHeaders($this->getHeaders($request))
                        ->delete(env('API_URL') . '/delete-portofolio/'. $id);

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function tutupBuku(Request $request, $id)
    {
        // dd($request, $id);
        $response = Http::withHeaders($this->getHeaders($request))
                        ->post(env('API_URL') . '/tutup-buku/'. $id);

        if ($response->status() == 200) {
            // $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('portofolio')->with('success', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }
}