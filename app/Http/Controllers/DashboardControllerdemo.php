<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // $res = Parent::getDataLogin($request);
        // Retrieve jenisFilter from session, defaulting to 'Kisaran' if not set
$jenisFilter = session('jenisFilter', 'Kisaran');

// Retrieve filterValue from session, defaulting to 'semuaHari' if not set and jenisFilter is 'Kisaran'
$filterValue = session('filterValue', ($jenisFilter == 'Kisaran') ? 'semuaHari' : null);

// dd($filterValue);

        $pemasukanData = collect();
        $pengeluaranData = collect();
        $currentPagePemasukan = 1;
        $currentPagePengeluaran = 1;
        
        do {
            $pemasukanRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->get(env('API_URL')."/pemasukans?page=$currentPagePemasukan");
            $dataPemasukan = $pemasukanRes->json();
            $pemasukanData = $pemasukanData->concat($dataPemasukan['data']);
            $currentPagePemasukan++;
        } while ($currentPagePemasukan <= $dataPemasukan['last_page']);

        // dd($request->auth['user']['user_id']);


        do {
            $pengeluaranRes = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->get(env('API_URL')."/pengeluarans?page=$currentPagePengeluaran");
            $dataPengeluaran = $pengeluaranRes->json();
            $pengeluaranData = $pengeluaranData->concat($dataPengeluaran['data']);
            $currentPagePengeluaran++;
        } while ($currentPagePengeluaran <= $dataPengeluaran['last_page']);
        
        $kategoriPemasukanId = $pemasukanData->pluck('id_kategori_pemasukan')->unique()->toArray();
        $kategoriPemasukanRes = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
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
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
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


        $user_id = $request->auth['user']['user_id']; // Assuming the user ID is in the 'user' array returned from your API call

        $alldata = $filteredAlldata->filter(function ($item) use ($user_id) {
            return $item['user_id'] == $user_id;
        }); 

        // dd($alldata);

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

// Define the filter type (Mingguan, Bulanan, Tahunan)
$filterType = $jenisFilter;

// Initialize variables to hold start and end dates
$startDate = null;
$endDate = null;

// Initialize variables to hold filtered results
$filterMingguan = null;
$filterBulanan = null;
$filterTahunan = null;

// Check the filter type and extract the start and end dates accordingly
if ($filterType === "Mingguan") {
    // Extract year and week number from "2024-W19"
    list($year, $week) = explode('-W', $filterValue);

    // Set start and end dates for the given week
    $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek();
    $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek();

    // Filter alldata by the calculated start and end dates for Mingguan
    $filterMingguan = $alldata->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
} elseif ($filterType === "Bulanan") {
    // Extract year and month from "2024-05"
    list($year, $month) = explode('-', $filterValue);

    // Set start and end dates for the given month
    $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
    $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

    // Filter alldata by the calculated start and end dates for Bulanan
    $filterBulanan = $alldata->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
} elseif ($filterType === "Tahunan") {
    // Extract year from "2024"
    $year = $filterValue;

    // Set start and end dates for the given year
    $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear();
    $endDate = Carbon::createFromDate($year, 12, 31)->endOfYear();

    // Filter alldata by the calculated start and end dates for Tahunan
    $filterTahunan = $alldata->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
}



        
        // dd($filterTahunan);

        $totalPemasukan = 0;
$totalPengeluaran = 0;
$catPemasukan = 0;
$catPengeluaran = 0;
        
        
        
        if ($jenisFilter == "Mingguan") {
            $saldoHarian = [];


            $catatanTerakhir = $filterMingguan->take(4)->values();
                foreach ($filterMingguan as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }
            
        } else if ($jenisFilter == "Bulanan") {
            $saldoHarian = [];


            $catatanTerakhir = $filterBulanan->take(4)->values();
                foreach ($filterBulanan as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }
            
        } else if ($jenisFilter == "Tahunan") {
            $saldoHarian = [];
            
            $catatanTerakhir = $filterTahunan->take(4)->values();
                foreach ($filterTahunan as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }
            
        } else if ($jenisFilter == "Kisaran") {
            // Initialize variables
            $saldoHarian = [];

            if ($filterValue == "semuaHari") {
                $catatanTerakhir = $filterSemua->take(4)->values();
                foreach ($filterSemua as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "iniHari") {
            $saldoHarian = [];

                $catatanTerakhir = $filterHariIni->take(4)->values();
                foreach ($filterHariIni as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "7Hari") {
            $saldoHarian = [];

                $catatanTerakhir = $filter7Hari->take(4)->values();
                foreach ($filter7Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "30Hari") {
            $saldoHarian = [];

                $catatanTerakhir = $filter30Hari->take(4)->values();
                foreach ($filter30Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
                
            } else if ($filterValue == "90Hari") {
            $saldoHarian = [];

                $catatanTerakhir = $filter90Hari->take(4)->values();
                foreach ($filter90Hari as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
                
            } else if ($filterValue == "12Bulan") {
            $saldoHarian = [];

                $catatanTerakhir = $filter12Bulan->take(4)->values();
                foreach ($filter12Bulan as $item) {
                    if (isset($item['id_pemasukan'])) { // Check if it's an income item
                        $totalPemasukan += $item['jumlah'];
                        $catPemasukan++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) + $item['jumlah'];
                    } elseif (isset($item['id_pengeluaran'])) { // Check if it's an expenditure item
                        $totalPengeluaran += abs($item['jumlah']);
                        $catPengeluaran++;
                        $tanggal = $item['tanggal'];
                        $saldoHarian[$tanggal] = ($saldoHarian[$tanggal] ?? 0) - abs($item['jumlah']);
                    }
                }

                // Calculate saldo
                $catTotal = $catPemasukan + $catPengeluaran;
                $saldo = $totalPemasukan - $totalPengeluaran;

                // Sort the saldo harian array by date in ascending order
                ksort($saldoHarian);

                // Initialize variables
                $cumulativeBalance = null;
                $cumulativeSaldoHarian = [];

                // Iterate over saldo harian array
                foreach ($saldoHarian as $date => $balance) {
                    if ($cumulativeBalance === null) {
                        // If this is the first iteration, set cumulative balance to the balance of the oldest date
                        $cumulativeBalance = $balance;
                    } else {
                        // Add the current balance to the cumulative balance
                        $cumulativeBalance += $balance;
                    }

                    // Store the cumulative balance for each date
                    $cumulativeSaldoHarian[$date] = $cumulativeBalance;
                }

                // dd($cumulativeSaldoHarian);
            }
            
        }


        // dd($filterValue, $jenisFilter);

        dd($saldoHarian, $cumulativeSaldoHarian);
        
        

        return view('dashboard.index', [
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'catPemasukan' => $catPemasukan,
            'catPengeluaran' => $catPengeluaran,
            'catTotal' => $catTotal,
            'saldo' => $saldo,
            'cumulativeSaldoHarian' => $cumulativeSaldoHarian,
            'saldoHarian' => $saldoHarian,
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
