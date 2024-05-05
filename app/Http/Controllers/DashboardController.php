<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $res = Parent::getDataLogin($request);
        // Retrieve jenisFilter from session, defaulting to 'Kisaran' if not set
$jenisFilter = session('jenisFilter', 'Kisaran');

// Retrieve filterValue from session, defaulting to 'semuaHari' if not set and jenisFilter is 'Kisaran'
$filterValue = session('filterValue', ($jenisFilter == 'Kisaran') ? 'semuaHari' : null);


        $pemasukanData = collect();
        $pengeluaranData = collect();
        $currentPagePemasukan = 1;
        $currentPagePengeluaran = 1;
        
        do {
            $pemasukanRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . request()->cookie('token')
            ])->get(env('API_URL')."/pemasukans?page=$currentPagePemasukan");
            $dataPemasukan = $pemasukanRes->json();
            $pemasukanData = $pemasukanData->concat($dataPemasukan['data']);
            $currentPagePemasukan++;
        } while ($currentPagePemasukan <= $dataPemasukan['last_page']);


        do {
            $pengeluaranRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . request()->cookie('token')
            ])->get(env('API_URL')."/pengeluarans?page=$currentPagePengeluaran");
            $dataPengeluaran = $pengeluaranRes->json();
            $pengeluaranData = $pengeluaranData->concat($dataPengeluaran['data']);
            $currentPagePengeluaran++;
        } while ($currentPagePengeluaran <= $dataPengeluaran['last_page']);
        
        $kategoriPemasukanId = $pemasukanData->pluck('id_kategori_pemasukan')->unique()->toArray();
        $kategoriPemasukanRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/kategori_pemasukans", [
            'id_kategori_pemasukan' => implode(',', $kategoriPemasukanId)
        ]);
        $kategoriPemasukanData = collect($kategoriPemasukanRes['data']);
        $combinedDataPemasukan = $pemasukanData->map(function ($pemasukanItem) use ($kategoriPemasukanData) {
            $relatedKategori = $kategoriPemasukanData->firstWhere('id_kategori_pemasukan', $pemasukanItem['id_kategori_pemasukan']);
            $pemasukanItem['kategori_pemasukan'] = $relatedKategori;
            return $pemasukanItem;
        });


        
        $kategoriPengeluaranId = $pengeluaranData->pluck('id_kategori_pengeluaran')->unique()->toArray();
        $kategoriPengeluaranRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->get(env('API_URL')."/kategori_pengeluarans", [
            'id_kategori_pengeluaran' => implode(',', $kategoriPengeluaranId)
        ]);
        $kategoriPengeluaranData = collect($kategoriPengeluaranRes['data']);
        $combinedDataPengeluaran = $pengeluaranData->map(function ($pengeluaranItem) use ($kategoriPengeluaranData) {
            $relatedKategori = $kategoriPengeluaranData->firstWhere('id_kategori_pengeluaran', $pengeluaranItem['id_kategori_pengeluaran']);
            $pengeluaranItem['kategori_pengeluaran'] = $relatedKategori;
            return $pengeluaranItem;
        });
        $combinedDataPengeluaran = $combinedDataPengeluaran->sortByDesc('id_pengeluaran');
        $combinedDataPemasukan = $combinedDataPemasukan->sortByDesc('id_pemasukan');

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
        
        $filteredAlldata = $combinedData->sortByDesc('tanggal');


        $user_id = $res['user']['user_id']; // Assuming the user ID is in the 'user' array returned from your API call

        $alldata = $filteredAlldata->filter(function ($item) use ($user_id) {
            return $item['user_id'] == $user_id;
        }); 

        // Assuming $filteredAlldata contains the combined and sorted data
        $currentDate = now();
$filterSemua = $alldata;

// Clone $currentDate before applying subDays() or subMonths() methods
$currentDateForHariIni = clone $currentDate;
$currentDateFor7Hari = clone $currentDate;
$currentDateFor30Hari = clone $currentDate;
$currentDateFor90Hari = clone $currentDate;
$currentDateFor12Bulan = clone $currentDate;

$filterHariIni = $alldata->where('tanggal', $currentDateForHariIni->toDateString());
$filter7Hari = $alldata->whereBetween('tanggal', [$currentDateFor7Hari->subDays(7)->toDateString(), $currentDate->toDateString()]);
$filter30Hari = $alldata->whereBetween('tanggal', [$currentDateFor30Hari->subDays(30)->toDateString(), $currentDate->toDateString()]);
$filter90Hari = $alldata->whereBetween('tanggal', [$currentDateFor90Hari->subDays(90)->toDateString(), $currentDate->toDateString()]);
$filter12Bulan = $alldata->whereBetween('tanggal', [$currentDateFor12Bulan->subMonths(12)->toDateString(), $currentDate->toDateString()]);



        
        // dd($filter7Hari);

        $totalPemasukan = 0;
$totalPengeluaran = 0;
$catPemasukan = 0;
$catPengeluaran = 0;
        
        
        
        if ($jenisFilter == "Mingguan") {
            
        } else if ($jenisFilter == "Bulanan") {
            
        } else if ($jenisFilter == "Tahunan") {
            
        } else if ($jenisFilter == "Kisaran") {
            if ($filterValue == "semuaHari") {
                
                $catatanTerakhir = $filterSemua->take(4)->values();
                foreach ($filterSemua as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }

                
                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;
            } else if ($filterValue == "iniHari") {
                $catatanTerakhir = $filterHariIni->take(4)->values();
                foreach ($filterHariIni as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }
                
                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;

                $saldo = $totalPemasukan - $totalPengeluaran;
                
            } else if ($filterValue == "7Hari") {
                $catatanTerakhir = $filter7Hari->take(4)->values();
                foreach ($filter7Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }
                
                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;

                $saldo = $totalPemasukan - $totalPengeluaran;
                // dd($catPemasukan);

                
            } else if ($filterValue == "30Hari") {
                $catatanTerakhir = $filter30Hari->take(4)->values();
                foreach ($filter30Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }
                
                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;

                $saldo = $totalPemasukan - $totalPengeluaran;
                
            } else if ($filterValue == "90Hari") {
                $catatanTerakhir = $filter90Hari->take(4)->values();
                foreach ($filter90Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }
                
                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;

                $saldo = $totalPemasukan - $totalPengeluaran;
                
            } else if ($filterValue == "12Bulan") {
                $catatanTerakhir = $filter12Bulan->take(4)->values();
                foreach ($filter12Bulan as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
        $totalPemasukan += $item['jumlah'];
        $catPemasukan++;
    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
        $totalPengeluaran += abs($item['jumlah']);
        $catPengeluaran++;
    }
                }
                
                $catTotal = $catPemasukan + $catPengeluaran;

                // Calculate saldo
                $saldo = $totalPemasukan - $totalPengeluaran;
                
            }
            
        }


        // dd($filterValue, $jenisFilter);
        
        

        return view('dashboard.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'catPemasukan' => $catPemasukan,
            'catPengeluaran' => $catPengeluaran,
            'catTotal' => $catTotal,
            'saldo' => $saldo,
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'catatanTerakhir' => $catatanTerakhir,
            'combinedDataPemasukan' => $combinedDataPemasukan,
            'combinedDataPengeluaran' => $combinedDataPengeluaran,
        ]);
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

        // Redirect back to the index view with the form data
        return redirect()->route('dashboard')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
        ]);
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
