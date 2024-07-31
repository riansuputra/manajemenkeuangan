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
    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }

    public function index(Request $request) {
        $jenisFilter = session('jenisFilter', 'Kisaran');
        $filterValue = session('filterValue', ($jenisFilter == 'Kisaran') ? 'semuaHari' : null);
        $filterValue2 = session('filterValue2');

        // dd($jenisFilter, $filterValue, $filterValue2);


        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pemasukansWeb'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/pengeluaransWeb'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori_pemasukansWeb'),
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/kategori_pengeluaransWeb')
        ]);

        // dd($responses);
    
        if ($responses[0]->successful() && $responses[1]->successful() && $responses[2]->successful() && $responses[3]->successful()) {
            $pemasukanData = collect($responses[0]->json()['data']['pemasukan']);
            $pengeluaranData = collect($responses[1]->json()['data']['pengeluaran']);
            $kategoriPemasukanData = collect($responses[2]->json()['data']['kategoriPemasukan']);
            $kategoriPengeluaranData = collect($responses[3]->json()['data']['kategoriPengeluaran']);

            $combinedData3 = $pemasukanData->merge($pengeluaranData);

            $filteredPemasukan = $this->applyDateFilters($pemasukanData, $jenisFilter, $filterValue, $filterValue2);
            $filteredPengeluaran = $this->applyDateFilters($pengeluaranData, $jenisFilter, $filterValue, $filterValue2);
            $groupedPemasukanData = $this->groupByCategoryPemasukan($filteredPemasukan['data']);
            $groupedPengeluaranData = $this->groupByCategoryPengeluaran($filteredPengeluaran['data']);
            // dd($combinedData3);
            
            $combinedData2 = $this->applyDateFilters($combinedData3, $jenisFilter, $filterValue, $filterValue2);
            $groupedSemuaData = $this->groupByCategory($combinedData2['data']);

            $startDate = $combinedData2['startDate']; // Access start date
            $endDate = $combinedData2['endDate'];

            $combinedData = $combinedData2['data'];

            // dd($groupedSemuaData);

            // dd($kategoriPemasukanData, $kategoriPengeluaranData);

            $combinedData = $combinedData->sort(function ($a, $b) {
                // Get the created_at timestamp for $a
                $aTimestamp = strtotime($a['created_at']);
            
                // Get the created_at timestamp for $b
                $bTimestamp = strtotime($b['created_at']);
            
                // Compare the timestamps and sort in descending order
                return $bTimestamp - $aTimestamp;
            });

            $sortedData = $combinedData->sortByDesc('tanggal');

            // dd($tanggalData);


            // dd($groupedData);

            
            $summary = $this->calculateSummary($sortedData);
            
            
            // dd($kategoriPemasukanData);
    
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
        // dd($data);
        return $data->groupBy(function ($item) {
            return $item['kategori_pemasukan']['nama_kategori_pemasukan']; // Access nested category name for income
        })->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            $jumlah_catatan = $items->count();
            return [
                'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'], // Access nested category name for income
                'total_jumlah' => $totalJumlah,
                'jumlah_catatan' => $jumlah_catatan,
            ];
        });
    }

    private function groupByCategory($data)
    {
        return $data->groupBy(function ($item) {
            return isset($item['id_pemasukan']) ? 'Pemasukan' : 'Pengeluaran';
            // dd($data);
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
        return $item['kategori_pengeluaran']['nama_kategori_pengeluaran']; // Access nested category name for expenses
    })->map(function ($items) {
        $totalJumlah = $items->sum('jumlah');
        $jumlah_catatan = $items->count();
        return [
            'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'], // Access nested category name for expenses
            'total_jumlah' => $totalJumlah,
            'jumlah_catatan' => $jumlah_catatan,
        ];
    });
}

    public function indexs(Request $request) {
        // Retrieve filter preferences from session or set defaults
        $jenisFilter = session('jenisFilter', 'Kisaran');
        $filterValue = session('filterValue', ($jenisFilter == 'Kisaran') ? 'semuaHari' : null);
    
        // Fetch and combine income data
        $pemasukanData = $this->fetchData($request, 'pemasukans');
    
        // Fetch and combine expense data
        $pengeluaranData = $this->fetchData($request, 'pengeluarans');
    
        // Get category details for income and expense items
        $kategoriPemasukanData = $this->fetchCategories($request, $pemasukanData, 'id_kategori_pemasukan');
        $kategoriPengeluaranData = $this->fetchCategories($request, $pengeluaranData, 'id_kategori_pengeluaran');
    
        // Merge and sort combined income and expense data
        $combinedData = $pemasukanData->merge($pengeluaranData)->sortByDesc('id');

        $combinedData = $combinedData->sort(function ($a, $b) {
            // Get the most recent timestamp for $a
            $aTimestamp = strtotime($a['updated_at'] ?? $a['created_at']);
            if ($aTimestamp > time()) {
                $aTimestamp = time();
            }
        
            // Get the most recent timestamp for $b
            $bTimestamp = strtotime($b['updated_at'] ?? $b['created_at']);
            if ($bTimestamp > time()) {
                $bTimestamp = time();
            }
        
            // Compare the timestamps
            return $bTimestamp - $aTimestamp; // Sort in descending order
        });
    
        // Filter data based on user ID
        $filteredData2 = $combinedData->where('user_id', $request->auth['user']['user_id']);
        

        // Apply date-based filters
        $filteredData1 = $this->applyDateFilters($filteredData2, $jenisFilter, $filterValue);

        // dd($filteredData1);


        $filteredData = $filteredData1['data'];

        // dd($filteredData);


        $alldata = $this->attachCategoryInfo($filteredData, $kategoriPemasukanData, $kategoriPengeluaranData);
        // dd($alldata);
    
        // Calculate financial summaries
        $summary = $this->calculateSummary($alldata);

        // dd($summary);
    
        // Prepare data for view
        return view('dashboard.index', [
            'alldata' => $alldata,
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'summary' => $summary
        ]);
    }

    private function fetchData(Request $request, $endpoint) {
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

    

    private function fetchCategories(Request $request, $items, $categoryIdKey) {
        $categoryIds = $items->pluck($categoryIdKey)->unique()->toArray();
    
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->get(env('API_URL') . "/" . str_replace('id_', '', $categoryIdKey) . "s", [
            $categoryIdKey => implode(',', $categoryIds)
        ]);

        // dd($response);
    
        return collect($response['data']);
    }

    private function attachCategoryInfo($filteredData, $kategoriPemasukanData, $kategoriPengeluaranData) {
        return $filteredData->map(function ($item) use ($kategoriPemasukanData, $kategoriPengeluaranData) {
            if (isset($item['id_pemasukan'])) {
                $item['kategori_pemasukan'] = $kategoriPemasukanData->firstWhere('id_kategori_pemasukan', $item['id_kategori_pemasukan']);
            } elseif (isset($item['id_pengeluaran'])) {
                $item['kategori_pengeluaran'] = $kategoriPengeluaranData->firstWhere('id_kategori_pengeluaran', $item['id_kategori_pengeluaran']);
            }
            return $item;
        });
    }
    
    
    private function applyDateFilters($data, $jenisFilter, $filterValue, $filterValue2 = null) {
        $startDate = null;
        $endDate = null;
        switch ($jenisFilter) {
            case 'Mingguan':
                // Apply weekly date filter
                list($year, $week) = explode('-W', $filterValue);
                
                // Set the date to the first day of the specified week
                $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek()->toDateString();
                $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek()->toDateString();
                
                $data = $data->whereBetween('tanggal', [$startDate, $endDate]);
                break;
            case 'Bulanan':
                // Apply monthly date filter
                list($year, $month) = explode('-', $filterValue);
                $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth()->toDateString();
                $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth()->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Custom':
                // Apply custom date range filter
                $startDate = Carbon::createFromFormat('Y-m-d', $filterValue)->toDateString();
                $endDate = Carbon::createFromFormat('Y-m-d', $filterValue2)->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Tahunan':
                // Apply yearly date filter
                $year = $filterValue;
                $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear()->toDateString();
                $endDate = Carbon::createFromDate($year, 12, 31)->endOfYear()->toDateString();
                $data = $data->whereBetween('tanggal', [
                    $startDate,
                    $endDate
                ]);
                break;
            case 'Kisaran':
                // Apply custom date range filter
                if ($filterValue === 'semuaHari') {
                    // Filter all data without specific date range
                    // No additional filtering needed here
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

        // dd($startDate, $endDate);
    
        return ['data' => $data, 'startDate' => $startDate, 'endDate' => $endDate];
    }

    public function filter(Request $request)
    {
        // Retrieve data from the submitted form
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

        // Perform any processing with the form data if needed

        // Redirect back to the index view with the form data stored in session
        return redirect()->route('dashboard')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'filterValue2' => $filterValue2,
        ]);
    }
    

    private function calculateSummary($data) {
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

        // dd($data);
    
        foreach ($data as $item) {
            if (isset($item['id_pemasukan'])) {
                $summary['totalPemasukan'] += $item['jumlah'];
                $summary['catPemasukan']++;
            } elseif (isset($item['id_pengeluaran'])) {
                $summary['totalPengeluaran'] += abs($item['jumlah']);
                $summary['catPengeluaran']++;
            }           
    
            // Ensure $item['tanggal'] is a Carbon date object
            $tanggal = Carbon::parse($item['tanggal']);
    
            // Calculate daily balances
            $saldoHarianKey = $tanggal->toDateString();
            if (!isset($summary['saldoHarian'][$saldoHarianKey])) {
                $summary['saldoHarian'][$saldoHarianKey] = 0;
            }
            $saldoHarian = $summary['saldoHarian'][$saldoHarianKey];
            if (isset($item['id_pemasukan'])) {
                $summary['saldoHarian'][$saldoHarianKey] = $saldoHarian + ($item['id_pemasukan'] ? $item['jumlah'] : -$item['jumlah']);

            } elseif (isset($item['id_pengeluaran'])) {
                $summary['saldoHarian'][$saldoHarianKey] = $saldoHarian + ($item['id_pengeluaran'] ? $item['jumlah'] : -$item['jumlah']);
            }
        }
    
        $summary['saldo'] = $summary['totalPemasukan'] - $summary['totalPengeluaran'];
        $summary['catTotal'] = $summary['catPemasukan'] + $summary['catPengeluaran'];
    
        // Calculate cumulative balances by date
        ksort($summary['saldoHarian']);
        $cumulativeBalance = 0;
        foreach ($summary['saldoHarian'] as $date => $saldoHarian) {
            $cumulativeBalance += $saldoHarian;
            $summary['cumulativeSaldoHarian'][$date] = $cumulativeBalance;
        }
        // dd($summary);
    
        return $summary;
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
