<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class AnggaranControllertest extends Controller
{
    public function index(Request $request) {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/anggarans'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pengeluaransWeb'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori_pengeluaransWeb')
        ]);

        $now = Carbon::now();
        $dateWeek = [
            'tanggal_mulai' => $now->copy()->startOfWeek(),
            'tanggal_selesai' => $now->copy()->endOfWeek()
            
        ];
        $dateMonth = [
            'tanggal_mulai' => $now->copy()->startOfMonth(),
            'tanggal_selesai' => $now->copy()->endOfMonth()
            
        ];
        $dateYear = [
            'tanggal_mulai' => $now->copy()->startOfYear(),
            'tanggal_selesai' => $now->copy()->endOfYear()
            
        ];
        $formattedDateWeek = $dateWeek['tanggal_mulai']->format('d') . ' - ' . $dateWeek['tanggal_selesai']->format('d') . ' ' . $dateWeek['tanggal_selesai']->format('F Y');
    
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful()) {
            $anggaranData = $responses[0]->json()['data']['anggaran'];
            $pengeluaranData = $responses[1]->json()['data']['pengeluaran'];
            $kategoriData = $responses[2]->json()['data']['kategoriPengeluaran'];
    
            

            $groupedPengeluaranData = collect($pengeluaranData)->groupBy('id_kategori_pengeluaran')->map(function ($items, $key) {
                return [
                    'id_kategori_pengeluaran' => $key,
                    'nama_kategori_pengeluaran' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                    'pengeluarans' => $items,
                ];
            });
    
            $groupedAnggaranData = collect($anggaranData)
                ->groupBy('periode')
                ->map(function ($items, $key) use ($groupedPengeluaranData) {
                    return $items->map(function ($item) use ($groupedPengeluaranData) {
                        $namaKategoriPengeluaran = $item['kategori_pengeluaran']['nama_kategori_pengeluaran'] ?? 'Unknown';
                        $item['nama_kategori_pengeluaran'] = $namaKategoriPengeluaran;

                        $item['kategori_pengeluaran'] = $groupedPengeluaranData->filter(function ($pengeluaran) use ($item) {
                            return $pengeluaran['id_kategori_pengeluaran'] == $item['id_kategori_pengeluaran']
                                && collect($pengeluaran['pengeluarans'])->filter(function ($pengeluaranItem) use ($item) {
                                    return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                                })->isNotEmpty();
                        })->map(function ($pengeluaran) use ($item) {
                            $pengeluaran['pengeluarans'] = collect($pengeluaran['pengeluarans'])->filter(function ($pengeluaranItem) use ($item) {
                                return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                            })->values();
                            return $pengeluaran;
                        })->values();

                        $totalJumlah = $item['kategori_pengeluaran']->sum(function ($kategori) {
                            return collect($kategori['pengeluarans'])->sum('jumlah');
                        });

                        $item['total_jumlah'] = $totalJumlah;

                        return $item;
                    })->sortByDesc('created_at');
                });

    
            $combinedAnggaranData = $groupedAnggaranData->map(function ($items) use ($groupedPengeluaranData) {
                return $items->map(function ($item) use ($groupedPengeluaranData) {
                    $item['kategori_pengeluaran'] = $groupedPengeluaranData->filter(function ($pengeluaran) use ($item) {
                        return $pengeluaran['id_kategori_pengeluaran'] == $item['id_kategori_pengeluaran']
                            && collect($pengeluaran['pengeluarans'])->filter(function ($pengeluaranItem) use ($item) {
                                return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                            })->isNotEmpty();
                    })->map(function ($pengeluaran) use ($item) {
                        $pengeluaran['pengeluarans'] = collect($pengeluaran['pengeluarans'])->filter(function ($pengeluaranItem) use ($item) {
                            return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                        })->values();
                        return $pengeluaran;
                    })->values();
    
                    return $item;
                });
            });

            // dd($combinedAnggaranData['Mingguan']);

            return view('anggaran.anggaran', [
                'combinedAnggaranData' => $combinedAnggaranData,
                'kategoriData' => $kategoriData,
                'dateWeek' => $dateWeek,
                'formattedDateWeek' => $formattedDateWeek
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function resetAnggaran(Request $request)
    // {
    //     $periode = $request->periode;
    //     $now = Carbon::now();
    //     $user_id = $request->auth['user']['user_id'];

    //     switch ($periode) {
    //         case 'Tahunan':
    //             $current_start_date = $now->copy()->startOfYear();
    //             $current_end_date = $now->copy()->endOfYear();
    //             break;

    //         case 'Mingguan':
    //             $current_start_date = $now->copy()->startOfWeek();
    //             $current_end_date = $now->copy()->endOfWeek();
    //             break;

    //         case 'Bulanan':
    //             $current_start_date = $now->copy()->startOfMonth();
    //             $current_end_date = $now->copy()->endOfMonth();
    //             break;

    //         default:
    //             return back()->with('error', 'Invalid period');
    //     }

    //     // Fetch the last saved period data from an API response
    //     $response = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'x-api-key' => env('API_KEY'),
    //         'Authorization' => 'Bearer ' . $request->auth['token'],
    //         'user-type' => $request->auth['user_type'],
    //     ])->get(env('API_URL') . '/anggarans', [
    //         'user_id' => $user_id,
    //         'periode' => $periode,
    //     ]);

    //     $combinedDataAnggaran = collect($response->json());
    //     \Log::info('Response from API:', $combinedDataAnggaran->toArray());

    //     // Extract the latest anggaran record from the response collection
    //     $last_anggaran = $combinedDataAnggaran->sortByDesc('tanggal_mulai')->first();

    //     if (!is_array($last_anggaran) || !isset($last_anggaran['tanggal_mulai']) || !isset($last_anggaran['tanggal_selesai'])) {
    //         \Log::error('Invalid last_anggaran structure:', ['last_anggaran' => $last_anggaran]);
    //         return false;
    //     }

    //     // Check if the period has changed
    //     $should_reset = true;
    //     if ($last_anggaran) {
    //         $last_start_date = Carbon::parse($last_anggaran['tanggal_mulai']);
    //         $last_end_date = Carbon::parse($last_anggaran['tanggal_selesai']);

    //         // Determine if the last period end date is before the current period start date
    //         if ($last_end_date->greaterThanOrEqualTo($current_start_date)) {
    //             $should_reset = false;
    //         }
    //     }

    //     if ($should_reset) {
    //         // Reset the budget values for the new period
    //         $input = array(
    //             'user_id' => $user_id,
    //             'periode' => $periode,
    //             'tanggal_mulai' => $current_start_date->toDateString(),
    //             'tanggal_selesai' => $current_end_date->toDateString(),
    //             'anggaran' => 0, // Reset budget to 0 or default value
    //             'id_kategori_pengeluaran' => $request->id_kategori_pengeluaran
    //         );

    //         // Save the new budget for the new period
    //         $response = Http::withHeaders([
    //             'Accept' => 'application/json',
    //             'x-api-key' => env('API_KEY'),
    //             'Authorization' => 'Bearer ' . $request->auth['token'],
    //             'user-type' => $request->auth['user_type'],
    //         ])->post(env('API_URL') . '/anggarans', $input);

    //         if ($response->status() == 200) {
    //             return true; // Successfully reset
    //         } else {
    //             return false; // Failed to reset
    //         }
    //     }

    //     return true; // No reset needed
    // }

    public function store(Request $request)
    {
        $periode = $request->periode;
        // dd($periode);
        $now = Carbon::now();

        switch ($periode) {
            case 'Tahunan':
                $tanggal_mulai = $now->copy()->startOfYear()->toDateString();
                $tanggal_selesai = $now->copy()->endOfYear()->toDateString();
                break;

            case 'Mingguan':
                $tanggal_mulai = $now->copy()->startOfWeek()->toDateString();
                $tanggal_selesai = $now->copy()->endOfWeek()->toDateString();
                break;

            case 'Bulanan':
                $tanggal_mulai = $now->copy()->startOfMonth()->toDateString();
                $tanggal_selesai = $now->copy()->endOfMonth()->toDateString();
                break;

            default:
                return back()->with('error', 'Invalid period');
        }

        // Proceed with storing the new data
        $input = array(
            'user_id' => $request->auth['user']['user_id'],
            'periode' => $periode,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'anggaran' => $request->jumlah1,
            'id_kategori_pengeluaran' => $request->id_kategori_pengeluaran
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/anggarans', $input);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggarannew')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
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
        // dd($request);
        $periode = $request->periodeedit;
        // dd($periode);
        $now = Carbon::now();

        switch ($periode) {
            case 'Tahunan':
                $tanggal_mulai = $now->copy()->startOfYear()->toDateString();
                $tanggal_selesai = $now->copy()->endOfYear()->toDateString();
                break;

            case 'Mingguan':
                $tanggal_mulai = $now->copy()->startOfWeek()->toDateString();
                $tanggal_selesai = $now->copy()->endOfWeek()->toDateString();
                break;

            case 'Bulanan':
                $tanggal_mulai = $now->copy()->startOfMonth()->toDateString();
                $tanggal_selesai = $now->copy()->endOfMonth()->toDateString();
                break;

            default:
                return back()->with('error', 'Invalid period');
        }

        // Proceed with storing the new data
        $input = array(
            'user_id' => $request->auth['user']['user_id'],
            'periode' => $periode,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'anggaran' => $request->jumlah1edit,
            'id_kategori_pengeluaran' => $request->id_kategori_pengeluaran_edit
        );


        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->patch(env('API_URL') . '/anggarans/'.$id, $input);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggarannew')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // dd($id);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->delete(env('API_URL') . '/anggarans/'.$id);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggarannew')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }

    }
}
