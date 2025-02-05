<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AnggaranController extends Controller
{
    public function index(Request $request) 
    {
        $view = $request->route('view', 'week');
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/anggaran'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pengeluaran'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pengeluaran')
        ]);

        $now = Carbon::now();
        $dateWeek = [
            'tanggal_mulai' => $now->copy()->startOfWeek(),
            'tanggal_selesai' => $now->copy()->endOfWeek()
        ];
        $dateMonth = $now->locale('id')->translatedFormat('F Y');
        $dateYear = $now->format('Y');
        $formattedDateWeek = $dateWeek['tanggal_mulai']->locale('id')->translatedFormat('d') . ' - ' . $dateWeek['tanggal_selesai']->locale('id')->translatedFormat('d') . ' ' . $dateWeek['tanggal_selesai']->locale('id')->translatedFormat('F Y');
    
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful()) {
            $anggaranData = $responses[0]->json()['data']['anggaran'];
            $pengeluaranData = $responses[1]->json()['data']['pengeluaran'];
            $kategoriData = $responses[2]->json()['data']['kategori_pengeluaran'];
    
            $groupedPengeluaranData = collect($pengeluaranData)->groupBy('kategori_pengeluaran_id')->map(function ($items, $key) {
                return [
                    'kategori_pengeluaran_id' => $key,
                    'nama_kategori_pengeluaran' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                    'pengeluaran' => $items,
                ];
            });

            $groupedAnggaranData = collect($anggaranData)->groupBy('periode')->map(function ($items, $key) use ($groupedPengeluaranData) {
                return $items->map(function ($item) use ($groupedPengeluaranData) {
                    $namaKategoriPengeluaran = $item['kategori_pengeluaran']['nama_kategori_pengeluaran'] ?? 'Unknown';
                    $item['nama_kategori_pengeluaran'] = $namaKategoriPengeluaran;

                    $item['kategori_pengeluaran'] = $groupedPengeluaranData->filter(function ($pengeluaran) use ($item) {
                        return $pengeluaran['kategori_pengeluaran_id'] == $item['kategori_pengeluaran_id']
                            && collect($pengeluaran['pengeluaran'])->filter(function ($pengeluaranItem) use ($item) {
                                return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                            })->isNotEmpty();
                    })->map(function ($pengeluaran) use ($item) {
                        $pengeluaran['pengeluaran'] = collect($pengeluaran['pengeluaran'])->filter(function ($pengeluaranItem) use ($item) {
                            return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                        })->values();
                        return $pengeluaran;
                    })->values();

                    $totalJumlah = $item['kategori_pengeluaran']->sum(function ($kategori) {
                        return collect($kategori['pengeluaran'])->sum('jumlah');
                    });

                    $item['total_jumlah'] = $totalJumlah;

                    return $item;
                })->sortByDesc('created_at');
            });

    
            $combinedAnggaranData = $groupedAnggaranData->map(function ($items) use ($groupedPengeluaranData) {
                return $items->map(function ($item) use ($groupedPengeluaranData) {
                    $item['kategori_pengeluaran'] = $groupedPengeluaranData->filter(function ($pengeluaran) use ($item) {
                        return $pengeluaran['kategori_pengeluaran_id'] == $item['kategori_pengeluaran_id']
                            && collect($pengeluaran['pengeluaran'])->filter(function ($pengeluaranItem) use ($item) {
                                return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                            })->isNotEmpty();
                    })->map(function ($pengeluaran) use ($item) {
                        $pengeluaran['pengeluaran'] = collect($pengeluaran['pengeluaran'])->filter(function ($pengeluaranItem) use ($item) {
                            return $pengeluaranItem['tanggal'] >= $item['tanggal_mulai'] && $pengeluaranItem['tanggal'] <= $item['tanggal_selesai'];
                        })->values();
                        return $pengeluaran;
                    })->values();
    
                    return $item;
                });
            });

            switch ($view) {
                case 'week':
                    $viewName = 'anggaran.week';
                    break;
                case 'month':
                    $viewName = 'anggaran.month';
                    break;
                case 'year':
                    $viewName = 'anggaran.year';
                    break;
                default:
                    $viewName = 'anggaran.week';
                    break;
            }

            return view($viewName, [
                'user' => $request->auth['user'],
                'combinedAnggaranData' => $combinedAnggaranData,
                'kategoriData' => $kategoriData,
                'dateWeek' => $dateWeek,
                'dateMonth' => $dateMonth,
                'dateYear' => $dateYear,
                'formattedDateWeek' => $formattedDateWeek
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    private function getHeaders($request) 
    {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }

    public function store(Request $request)
    {
        $periode = $request->periode;
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

        $input = array(
            'user_id' => $request->auth['user']['id'],
            'periode' => $periode,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'anggaran' => $request->jumlah1,
            'kategori_pengeluaran_id' => $request->id_kategori_pengeluaran
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/anggaran', $input);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggaranWeek')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function update(Request $request, string $id)
    {
        $periode = $request->periodeedit;
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

        $input = array(
            'user_id' => $request->auth['user']['id'],
            'periode' => $periode,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'anggaran' => $request->jumlah1edit,
            'kategori_pengeluaran_id' => $request->id_kategori_pengeluaran_edit
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->patch(env('API_URL') . '/anggaran/'.$id, $input);

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggarannew')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function destroy(Request $request, string $id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->delete(env('API_URL') . '/anggaran/'.$id);

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('anggarannew')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }

    }
}