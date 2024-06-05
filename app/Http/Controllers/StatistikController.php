<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
{
    $user_id = $request->auth['user']['user_id'];

    // Retrieve filter parameters from session or default to 'Kisaran' with 'semuaHari'
    $jenisFilter = session('jenisFilter', 'Kisaran');
    $filterValue = session('filterValue', $jenisFilter == 'Kisaran' ? 'semuaHari' : null);

    // dd($filterValue, $jenisFilter);

    
    // Determine start and end dates based on filter type and value
    list($startDate, $endDate) = $this->determineFilterType($jenisFilter, $filterValue);
    // dd($startDate, $endDate);
    // Fetch all pemasukan and pengeluaran data
    $pemasukanData = $this->fetchDataFromApi($request, 'pemasukans');
    $pengeluaranData = $this->fetchDataFromApi($request, 'pengeluarans');
    
    // Fetch kategori data for pemasukan and pengeluaran
    $kategoriPemasukanData = $this->fetchKategoriData($request, 'kategori_pemasukans', $pemasukanData, 'id_kategori_pemasukan');
    $kategoriPengeluaranData = $this->fetchKategoriData($request, 'kategori_pengeluarans', $pengeluaranData, 'id_kategori_pengeluaran');
    
    // Merge kategori data into pemasukan and pengeluaran data
    $combinedDataPemasukan = $this->mergeKategoriData($pemasukanData, $kategoriPemasukanData, 'id_kategori_pemasukan', 'kategori_pemasukan');
    $combinedDataPengeluaran = $this->mergeKategoriData($pengeluaranData, $kategoriPengeluaranData, 'id_kategori_pengeluaran', 'kategori_pengeluaran');
    
    // Filter combined data by user_id and date range
    $filteredPemasukan = $this->filterByUserId($combinedDataPemasukan, $user_id);
    $filteredPengeluaran = $this->filterByUserId($combinedDataPengeluaran, $user_id);
    
    // Apply date range filtering to filtered data
    $filteredPemasukan = $this->filterDataByDateRange($filteredPemasukan, $startDate, $endDate);
    $filteredPengeluaran = $this->filterDataByDateRange($filteredPengeluaran, $startDate, $endDate);
    
    // dd($filteredPemasukan);
    // Merge filtered pemasukan and pengeluaran data
    $combinedData = $filteredPemasukan->merge($filteredPengeluaran);

    // Group and summarize data based on selected filter type
    $groupedPemasukanData = $this->groupByCategoryPemasukan($filteredPemasukan);
    $groupedPengeluaranData = $this->groupByCategoryPengeluaran($filteredPengeluaran);

    dd($filteredPemasukan);

    return view('statistik.index', [
        'user' => $request->auth['user'],
        'pemasukan' => $pemasukanData,
        'pengeluaran' => $pengeluaranData,
        'alldata' => $combinedData->sortByDesc('tanggal'),
        'groupedPemasukanData' => $groupedPemasukanData,
        'groupedPengeluaranData' => $groupedPengeluaranData,
        'jenisFilter' => $jenisFilter,
        'filterValue' => $filterValue,
    ]);
}

 
     private function fetchDataFromApi(Request $request, $resource)
     {
         $currentPage = 1;
         $data = collect();
 
         do {
             $response = Http::withHeaders([
                 'Accept' => 'application/json',
                 'x-api-key' => env('API_KEY'),
                 'Authorization' => 'Bearer ' . $request->auth['token'],
                 'user-type' => $request->auth['user_type'],
             ])->get(env('API_URL') . "/$resource?page=$currentPage");
 
             $responseData = $response->json();
             $data = $data->concat($responseData['data']);
             $currentPage++;
         } while ($currentPage <= $responseData['last_page']);
 
         return $data;
     }
 
     private function fetchKategoriData(Request $request, $resource, $data, $idKey)
     {
         $kategoriIds = $data->pluck($idKey)->unique()->toArray();
         $response = Http::withHeaders([
             'Accept' => 'application/json',
             'x-api-key' => env('API_KEY'),
             'Authorization' => 'Bearer ' . $request->auth['token'],
             'user-type' => $request->auth['user_type'],
         ])->get(env('API_URL') . "/$resource", [
             $idKey => implode(',', $kategoriIds)
         ]);
 
         return collect($response->json()['data']);
     }
 
     private function mergeKategoriData($mainData, $kategoriData, $idKey, $kategoriKey)
     {
         return $mainData->map(function ($item) use ($kategoriData, $idKey, $kategoriKey) {
             $relatedKategori = $kategoriData->firstWhere($idKey, $item[$idKey]);
             $item[$kategoriKey] = $relatedKategori;
             return $item;
         });
     }
 
     private function filterByUserId($data, $user_id)
     {
         return $data->filter(function ($item) use ($user_id) {
             return $item['user_id'] == $user_id;
         });
     }
 
     private function groupByCategoryPemasukan($data)
    {
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


    // Helper method to group and sum data based on a specific key
    private function groupAndSumData($data, $key)
    {
        // dd($data);
        return $data->groupBy("id_$key")->map(function ($items) {
            $totalJumlah = $items->sum('jumlah');
            $jumlah_catatan = $items->count();
            return [
                'kategori' => $items->first()["kategori_$key"]["nama_kategori_$key"],
                'total_jumlah' => $totalJumlah,
                'jumlah_catatan' => $jumlah_catatan
            ];
        });
    }

    // Helper method to determine the filter type and date range
    private function determineFilterType($jenisFilter, $filterValue)
    {
        $currentDate = now();
        $startDate = null;
        $endDate = null;

        switch ($jenisFilter) {
            case 'Mingguan':
                list($year, $week) = explode('-', $filterValue);
                $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek();
                $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek();
                break;
            case 'Bulanan':
                list($year, $month) = explode('-', $filterValue);
                $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
                $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
                break;
            case 'Tahunan':
                $startDate = Carbon::createFromDate($filterValue, 1, 1)->startOfYear();
                $endDate = Carbon::createFromDate($filterValue, 12, 31)->endOfYear();
                break;
            case 'Kisaran':
                switch ($filterValue) {
                    case 'semuaHari':
                        $startDate = Carbon::create(1900, 1, 1)->startOfDay();
                // Set the end date to the current date's end of day
                        $endDate = $currentDate->endOfDay();
                        break;
                    case 'iniHari':
                        $startDate = $currentDate->copy()->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                    case '7Hari':
                        $startDate = $currentDate->copy()->subDays(7)->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                    case '30Hari':
                        $startDate = $currentDate->copy()->subDays(30)->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                    case '90Hari':
                        $startDate = $currentDate->copy()->subDays(90)->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                    case '12Bulan':
                        $startDate = $currentDate->copy()->subMonths(12)->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                    default:
                        // Default to today's date if no valid filter value is provided
                        $startDate = $currentDate->copy()->startOfDay();
                        $endDate = $currentDate->copy()->endOfDay();
                        break;
                }
                break;           
        }

        return [$startDate, $endDate];
    }

    // Helper method to filter data by date range
    private function filterDataByDateRange($data, $startDate, $endDate, $dateField = 'tanggal')
    {
        return $data->filter(function ($item) use ($startDate, $endDate, $dateField) {
            $itemDate = Carbon::parse($item[$dateField]);
            return $itemDate->between($startDate, $endDate);
        });
    }

    public function filter(Request $request)
    {
        // Retrieve data from the submitted form
        $jenisFilter = $request->input('jenisFilter', 'Kisaran');

        $filterValue = null;
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
            case 'Kisaran':
                $filterValue = $request->input('filterKisaran', 'semuaHari');
                break;
        }

        // Perform any processing with the form data if needed

        // Redirect back to the index view with the form data stored in session
        return redirect()->route('statistik')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
        ]);
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
