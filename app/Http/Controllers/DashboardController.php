<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Client\Pool;

class DashboardController extends Controller
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

    public function index(Request $request) 
    {
        $jenisFilter = session('jenisFilter', 'Kisaran');
        $filterValue = session('filterValue', ($jenisFilter == 'Kisaran') ? 'semuaHari' : null);
        $filterValue2 = session('filterValue2');

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pemasukan'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pengeluaran'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pemasukan'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori-pengeluaran')
        ]);

        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful() && $responses[3]->successful()) {
            $pemasukanData = collect($responses[0]->json()['data']['pemasukan']);
            $pengeluaranData = collect($responses[1]->json()['data']['pengeluaran']);
            $kategoriPemasukanData = collect($responses[2]->json()['data']['kategori_pemasukan']);
            $kategoriPengeluaranData = collect($responses[3]->json()['data']['kategori_pengeluaran']);

            $combinedData3 = $pemasukanData->merge($pengeluaranData);

            $filteredPemasukan = $this->applyDateFilters($pemasukanData, $jenisFilter, $filterValue, $filterValue2);
            $filteredPengeluaran = $this->applyDateFilters($pengeluaranData, $jenisFilter, $filterValue, $filterValue2);
            $groupedPemasukanData = $this->groupByCategoryPemasukan($filteredPemasukan['data']);
            $groupedPengeluaranData = $this->groupByCategoryPengeluaran($filteredPengeluaran['data']);
            
            $combinedData2 = $this->applyDateFilters($combinedData3, $jenisFilter, $filterValue, $filterValue2);
            $groupedSemuaData = $this->groupByCategory($combinedData2['data']);

            $startDate = $combinedData2['startDate'];
            $endDate = $combinedData2['endDate'];

            $combinedData = $combinedData2['data'];

            $combinedData = $combinedData->sort(function ($a, $b) {
                $aTimestamp = strtotime($a['created_at']);
                $bTimestamp = strtotime($b['created_at']);
            
                return $bTimestamp - $aTimestamp;
            });

            $sortedData = $combinedData->sortByDesc('tanggal');
            $summary = $this->calculateSummary($sortedData);

            return view('dashboard.index', [
                'user' => $request->auth['user'],
                'jenisFilter' => $jenisFilter,
                'filterValue' => $filterValue,
                'summary' => $summary,
                'sortedData' => $sortedData,
                'combinedData' => $combinedData,
                'groupedSemuaData' => $groupedSemuaData,
                'groupedPemasukanData' => $groupedPemasukanData,
                'groupedPengeluaranData' => $groupedPengeluaranData,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'jenisFilter' => $jenisFilter,
                'filterValue' => $filterValue,
                'kategoriPemasukanData' => $kategoriPemasukanData,
                'kategoriPengeluaranData' => $kategoriPengeluaranData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    private function groupByCategoryPemasukan($data)
    {
        return $data->groupBy(function ($item) {
            return $item['kategori_pemasukan']['nama_kategori_pemasukan'];
        })->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            $jumlah_catatan = $items->count();
            return [
                'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                'total_jumlah' => $totalJumlah,
                'jumlah_catatan' => $jumlah_catatan,
            ];
        });
    }

    private function groupByCategory($data)
    {
        return $data->groupBy(function ($item) {
            return isset($item['kategori_pemasukan_id']) ? 'Pemasukan' : 'Pengeluaran';
        })->map(function ($items, $key) {
            $totalJumlah = $items->sum('jumlah');
            return [
                'jenis' => $key,
                'total_jumlah' => $totalJumlah,
            ];
        });
    }

    private function groupByCategoryPengeluaran($data)
    {
        return $data->groupBy(function ($item) {
            return $item['kategori_pengeluaran']['nama_kategori_pengeluaran'];
        })->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            $jumlah_catatan = $items->count();
            return [
                'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                'total_jumlah' => $totalJumlah,
                'jumlah_catatan' => $jumlah_catatan,
            ];
        });
    }

    private function fetchData(Request $request, $endpoint) 
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
    
    private function fetchCategories(Request $request, $items, $categoryIdKey) 
    {
        $categoryIds = $items->pluck($categoryIdKey)->unique()->toArray();
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->get(env('API_URL') . "/" . str_replace('id_', '', $categoryIdKey) . "s", [
            $categoryIdKey => implode(',', $categoryIds)
        ]);
        return collect($response['data']);
    }

    private function attachCategoryInfo($filteredData, $kategoriPemasukanData, $kategoriPengeluaranData) 
    {
        return $filteredData->map(function ($item) use ($kategoriPemasukanData, $kategoriPengeluaranData) {
            if (isset($item['kategori_pemasukan_id'])) {
                $item['kategori_pemasukan'] = $kategoriPemasukanData->firstWhere('id_kategori_pemasukan', $item['id_kategori_pemasukan']);
            } elseif (isset($item['kategori_pengeluaran_id'])) {
                $item['kategori_pengeluaran'] = $kategoriPengeluaranData->firstWhere('id_kategori_pengeluaran', $item['id_kategori_pengeluaran']);
            }
            return $item;
        });
    }
    
    private function applyDateFilters($data, $jenisFilter, $filterValue, $filterValue2 = null) 
    {
        $startDate = null;
        $endDate = null;
        switch ($jenisFilter) {
            case 'Mingguan':
                list($year, $week) = explode('-W', $filterValue);
                $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek()->toDateString();
                $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek()->toDateString();
                $data = $data->whereBetween('tanggal', [$startDate, $endDate]);
                break;
            case 'Bulanan':
                list($year, $month) = explode('-', $filterValue);
                $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth()->toDateString();
                $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth()->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Custom':
                $startDate = Carbon::createFromFormat('Y-m-d', $filterValue)->toDateString();
                $endDate = Carbon::createFromFormat('Y-m-d', $filterValue2)->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Tahunan':
                $year = $filterValue;
                $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear()->toDateString();
                $endDate = Carbon::createFromDate($year, 12, 31)->endOfYear()->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Kisaran':
                if ($filterValue === 'semuaHari') {

                } elseif ($filterValue === 'iniHari') {
                    $startDate = Carbon::now()->toDateString();
                    $endDate = Carbon::now()->toDateString();
                    $data = $data->where('tanggal', Carbon::now()->toDateString());
                } elseif ($filterValue === '7Hari') {
                    $startDate = Carbon::now()->subDays(7)->toDateString();
                    $endDate = Carbon::now()->toDateString();
                    $data = $data->whereBetween('tanggal', [
                        $startDate,
                        $endDate
                    ]);
                } elseif ($filterValue === '30Hari') {
                    $startDate = Carbon::now()->subDays(30)->toDateString();
                    $endDate = Carbon::now()->toDateString();
                    $data = $data->whereBetween('tanggal', [
                        $startDate,
                        $endDate
                    ]);
                } elseif ($filterValue === '90Hari') {
                    $startDate = Carbon::now()->subDays(90)->toDateString();
                    $endDate = Carbon::now()->toDateString();
                    $data = $data->whereBetween('tanggal', [
                        $startDate,
                        $endDate
                    ]);
                } elseif ($filterValue === '12Bulan') {
                    $startDate = Carbon::now()->subMonths(12)->toDateString();
                    $endDate = Carbon::now()->toDateString();
                    $data = $data->whereBetween('tanggal', [
                        $startDate,
                        $endDate
                    ]);
                }
                break;
        }
        return ['data' => $data, 'startDate' => $startDate, 'endDate' => $endDate];
    }

    public function filter(Request $request)
    {
        $jenisFilter = $request->input('jenisFilter', 'Kisaran');

        $filterValue = null;
        $filterValue2 = null;
        switch ($jenisFilter) {
            case 'Mingguan':
                $filterValue = $request->input('filterMingguan');
                break;
            case 'Bulanan':
                $filterValue = $request->input('filterBulanan');
                break;
            case 'Tahunan':
                $filterValue = $request->input('filterTahunan');
                break;
            case 'Custom':
                $filterValue = $request->input('startdate-filter');
                $filterValue2 = $request->input('enddate-filter');
                break;
            case 'Kisaran':
                $filterValue = $request->input('filterKisaran', 'semuaHari');
                break;
        }
        return redirect()->route('dashboard')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'filterValue2' => $filterValue2,
        ]);
    }

    private function calculateSummary($data) 
    {
        $summary = [
            'totalPemasukan' => 0,
            'totalPengeluaran' => 0,
            'catPemasukan' => 0,
            'catPengeluaran' => 0,
            'catTotal' => 0,
            'saldo' => 0,
            'cumulativeSaldoHarian' => [],
            'saldoHarian' => []
        ];
    
        foreach ($data as $item) {
            if (isset($item['kategori_pemasukan_id'])) {
                $summary['totalPemasukan'] += $item['jumlah'];
                $summary['catPemasukan']++;
            } elseif (isset($item['kategori_pengeluaran_id'])) {
                $summary['totalPengeluaran'] += abs($item['jumlah']);
                $summary['catPengeluaran']++;
            }           
    
            $tanggal = Carbon::parse($item['tanggal']);
            $saldoHarianKey = $tanggal->toDateString();
            if (!isset($summary['saldoHarian'][$saldoHarianKey])) {
                $summary['saldoHarian'][$saldoHarianKey] = 0;
            }
            $saldoHarian = $summary['saldoHarian'][$saldoHarianKey];
            if (isset($item['kategori_pemasukan_id'])) {
                $summary['saldoHarian'][$saldoHarianKey] = $saldoHarian + ($item['kategori_pemasukan_id'] ? $item['jumlah'] : -$item['jumlah']);

            } elseif (isset($item['kategori_pengeluaran_id'])) {
                $summary['saldoHarian'][$saldoHarianKey] = $saldoHarian + ($item['kategori_pengeluaran_id'] ? $item['jumlah'] : -$item['jumlah']);
            }
        }
    
        $summary['saldo'] = $summary['totalPemasukan'] - $summary['totalPengeluaran'];
        $summary['catTotal'] = $summary['catPemasukan'] + $summary['catPengeluaran'];
    
        ksort($summary['saldoHarian']);
        $cumulativeBalance = 0;
        foreach ($summary['saldoHarian'] as $date => $saldoHarian) {
            $cumulativeBalance += $saldoHarian;
            $summary['cumulativeSaldoHarian'][$date] = $cumulativeBalance;
        }
        return $summary;
    }

    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}