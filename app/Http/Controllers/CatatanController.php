<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class CatatanController extends Controller
{
    public function indextest() {
        return view('catatan.indextest');
    }
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

            // dd($combinedData3);

            $combinedData2 = $this->applyDateFilters($combinedData3, $jenisFilter, $filterValue, $filterValue2);

            $startDate = $combinedData2['startDate']; // Access start date
            $endDate = $combinedData2['endDate'];

            $combinedData = $combinedData2['data'];

            // dd($combinedData);

            // dd($kategoriPemasukanData, $kategoriPengeluaranData);

            $combinedData = $combinedData->sort(function ($a, $b) {
                // Get the created_at timestamp for $a
                $aTimestamp = strtotime($a['created_at']);
            
                // Get the created_at timestamp for $b
                $bTimestamp = strtotime($b['created_at']);
            
                // Compare the timestamps and sort in descending order
                return $bTimestamp - $aTimestamp;
            });

            $tanggalData = $combinedData->sortByDesc('tanggal');

            // dd($tanggalData);

            $groupedData = $tanggalData->groupBy('tanggal');

            // dd($groupedData);

            $summedData = $groupedData->map(function ($group) {
                $totalPemasukan = $group->where('id_pemasukan')->sum('jumlah');
                $totalPengeluaran = $group->where('id_pengeluaran')->sum('jumlah');
                $totalJumlah = $totalPemasukan - $totalPengeluaran;
            
                return $group->map(function ($item) use ($totalJumlah) {
                    $item['total_jumlah'] = $totalJumlah;
                    return $item;
                });
            });
            
            // dd($summedData);
            
            
            // dd($kategoriPemasukanData);
    
            return view('catatan.index', [
                'user' => $request->auth['user'],
                'groupedData' => $groupedData,
                'combinedData' => $combinedData,
                'summedData' => $summedData,
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
        return redirect()->route('catatanHarian')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'filterValue2' => $filterValue2,
        ]);
    }

    private function fetchData(Request $request, $resource)
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

            $jsonData = $response->json();
            $data = $data->concat($jsonData['data']);
            $currentPage++;
        } while ($currentPage <= $jsonData['last_page']);

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
        // dd($response);

        return collect($response['data']);
    }

    private function filterUserData($data, $userId)
    {
        return $data->filter(function ($item) use ($userId) {
            return $item['user_id'] == $userId;
        });
    }

    private function groupByDate($data, $dateFormat)
    {
        return $data->groupBy(function ($item) use ($dateFormat) {
            return Carbon::parse($item['tanggal'])->format($dateFormat);
        });
    }

    public function indexweb(Request $request)
    {
        $user_id = $request->auth['user']['user_id'];

        $pemasukanData = $this->fetchData($request, 'pemasukans');
        $pengeluaranData = $this->fetchData($request, 'pengeluarans');

        $kategoriPemasukanData = $this->fetchCategories($request, $pemasukanData, 'id_kategori_pemasukan');
        $kategoriPengeluaranData = $this->fetchCategories($request, $pengeluaranData, 'id_kategori_pengeluaran');

        $combinedDataPemasukan = $pemasukanData->map(function ($item) use ($kategoriPemasukanData) {
            $item['kategori_pemasukan'] = $kategoriPemasukanData->firstWhere('id_kategori_pemasukan', $item['id_kategori_pemasukan']);
            return $item;
        });

        $combinedDataPengeluaran = $pengeluaranData->map(function ($item) use ($kategoriPengeluaranData) {
            $item['kategori_pengeluaran'] = $kategoriPengeluaranData->firstWhere('id_kategori_pengeluaran', $item['id_kategori_pengeluaran']);
            return $item;
        });

        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);

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

        $alldata = $this->filterUserData($combinedData, $user_id);

        return view('catatan.index', [
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'combinedDataPemasukan' => $combinedDataPemasukan,
            'combinedDataPengeluaran' => $combinedDataPengeluaran,
        ]);
    }


    public function indexMingguan(Request $request)
    {
        $res = Parent::getDataLogin($request);
        $user_id = $request->auth['user']['user_id'];

        $alldata = $this->fetchData($request, 'pemasukans')->merge($this->fetchData($request, 'pengeluarans'));
        $alldata = $this->filterUserData($alldata, $user_id);

        $groupedData = $this->groupByDate($alldata, 'Y-\WW');

        $sortedData = $groupedData->map(function ($items, $weekYear) {
            list($year, $week) = explode('-', $weekYear);
            $weekNumber = str_replace('W', '', $week);

            $startDate = Carbon::now()->setISODate($year, $weekNumber)->startOfWeek();
            $endDate = Carbon::now()->setISODate($year, $weekNumber)->endOfWeek();

            $pemasukanSum = $items->whereNotNull('id_pemasukan')->sum('jumlah');
            $pengeluaranSum = $items->whereNotNull('id_pengeluaran')->sum('jumlah');

            return [
                'minggu' => 'Minggu Ke-' . $weekNumber,
                'tahun' => $year,
                'jumlah_pemasukan' => $pemasukanSum,
                'jumlah_pengeluaran' => $pengeluaranSum,
                'start_date' => $startDate->format('d/m/Y'),
                'end_date' => $endDate->format('d/m/Y'),
            ];
        });

        return view('catatan.indexMingguan', [
            'sortedData' => $sortedData,
        ]);
    }

    public function indexBulanan(Request $request)
    {
        $res = Parent::getDataLogin($request);
        $user_id = $request->auth['user']['user_id'];

        $alldata = $this->fetchData($request, 'pemasukans')->merge($this->fetchData($request, 'pengeluarans'));
        $alldata = $this->filterUserData($alldata, $user_id);

        $groupedData = $this->groupByDate($alldata, 'Y-m');

        $sortedData = $groupedData->map(function ($items, $monthYear) {
            list($year, $month) = explode('-', $monthYear);

            $pemasukanSum = $items->whereNotNull('id_pemasukan')->sum('jumlah');
            $pengeluaranSum = $items->whereNotNull('id_pengeluaran')->sum('jumlah');

            // Create a Carbon instance for the first day of the month
            $startDate = Carbon::create($year, $month, 1)->startOfMonth();
            // Create a Carbon instance for the last day of the month
            $endDate = Carbon::create($year, $month, 1)->endOfMonth();

            return [
                'bulan' => Carbon::create($year, $month, 1)->translatedFormat('F Y'),
                'tahun' => $year,
                'jumlah_pemasukan' => $pemasukanSum,
                'jumlah_pengeluaran' => $pengeluaranSum,
                'start_date' => $startDate->format('d/m/Y'),
                'end_date' => $endDate->format('d/m/Y'),
            ];
        });

        return view('catatan.indexBulanan', [
            'sortedData' => $sortedData,
        ]);
    }


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);

        $apiUrlPemasukan = env('API_URL').'/pemasukans';
        $apiUrlPengeluaran = env('API_URL').'/pengeluarans';
        $apiKey = env('API_KEY');        
        $res = Parent::getDataLogin($request);

        if($request->jenis == 1) {
            $jenis = 'id_kategori_pemasukan';
            $jenisapi = $apiUrlPemasukan;
        }else if ($request->jenis == 2){
            $jenis = 'id_kategori_pengeluaran';
            $jenisapi = $apiUrlPengeluaran;
        }

        $input = array(
            'user_id' => $request->auth['user']['user_id'],
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah1,
            'catatan' => $request->catatan,
            $jenis => $request->kategori,
        );
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => $apiKey,
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post($jenisapi, $input);

        if($response->status() == 200){
            
            return redirect()->route('loginPage')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('success',$response["message"]);
        }else{
            return back()->with('success',$response["message"]);
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $jenisedit2 = $request->input('jenisedit2'.$id);
        // dd($jenisedit2 != $request->jenisedit);


        

        

        


        if($jenisedit2 != $request->jenisedit) {
            if($request->jenisedit == 1) {
                $apiUrlPemasukanDel = env('API_URL').'/pemasukans/'.$id;
                $jenis = 'id_kategori_pemasukan';
                $jenisapiDel = $apiUrlPemasukanDel;
            }else if ($request->jenisedit == 2){
                $apiUrlPengeluaranDel = env('API_URL').'/pengeluarans/'.$id;
                $jenis = 'id_kategori_pengeluaran';
                $jenisapiDel = $apiUrlPengeluaranDel;
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->delete($jenisapiDel);

            if($jenisedit2 == 1) {
                $apiUrlPemasukan = env('API_URL').'/pemasukans';
                $jenis = 'id_kategori_pemasukan';
                $jenisapi = $apiUrlPemasukan;
            }else if ($jenisedit2 == 2){
                $apiUrlPengeluaran = env('API_URL').'/pengeluarans';
                $jenis = 'id_kategori_pengeluaran';
                $jenisapi = $apiUrlPengeluaran;
            }

            $input = array(
                'user_id' => $request->auth['user']['user_id'],
                'tanggal' => $request->tanggaledit,
                'jumlah' => $request->jumlah1edit,
                'catatan' => $request->catatanedit,
                $jenis => $request->kategoriedit,
            );

            

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->post($jenisapi, $input);

            if($response->status() == 200){
            
                return redirect()->route('catatanHarian')->with('success',$response["message"]);
            }else if(!empty($response["errors"])){
                return back()->with('success',$response["message"]);
            }else{
                return back()->with('success',$response["message"]);
            }





        } else if ($jenisedit2 == $request->jenisedit) {

            if($request->jenisedit == 1) {
                $apiUrlPemasukan = env('API_URL').'/pemasukans/'.$id;
                $jenis = 'id_kategori_pemasukan';
                $jenisapi = $apiUrlPemasukan;
            }else if ($request->jenisedit == 2){
                $apiUrlPengeluaran = env('API_URL').'/pengeluarans/'.$id;
                $jenis = 'id_kategori_pengeluaran';
                $jenisapi = $apiUrlPengeluaran;
            }
    
            $input = array(
                'user_id' => $request->auth['user']['user_id'],
                'tanggal' => $request->tanggaledit,
                'jumlah' => $request->jumlah1edit,
                'catatan' => $request->catatanedit,
                $jenis => $request->kategoriedit,
            );
            
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->patch($jenisapi, $input);

            if($response->status() == 200){
            
                return redirect()->route('catatanHarian')->with('success',$response["message"]);
            }else if(!empty($response["errors"])){
                return back()->with('success',$response["message"]);
            }else{
                return back()->with('success',$response["message"]);
            }

        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // dd($request);
        $apiUrlPemasukan = env('API_URL').'/pemasukans/'.$id;
        $apiUrlPengeluaran = env('API_URL').'/pengeluarans/'.$id;
        $apiKey = env('API_KEY');        
        // $res = Parent::getDataLogin($request);

        if($request->jenishapus == 1) {
            $jenisapi = $apiUrlPemasukan;
        }else if ($request->jenishapus == 2){
            $jenisapi = $apiUrlPengeluaran;
        }
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => $apiKey,
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->delete($jenisapi);

        if($response->status() == 200){
            
            return redirect()->route('catatanHarian')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('success',$response["message"]);
        }else{
            return back()->with('success',$response["message"]);
        }
    }

    
}
