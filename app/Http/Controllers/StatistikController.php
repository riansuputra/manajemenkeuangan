<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $res = Parent::getDataLogin($request);
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

        $user_id = $res['user']['user_id']; // Assuming the user ID is in the 'user' array returned from your API call

        $comPemasukan = $combinedDataPemasukan->filter(function ($item) use ($user_id) {
            return $item['user_id'] == $user_id;
        }); 

        $comPengeluaran = $combinedDataPengeluaran->filter(function ($item) use ($user_id) {
            return $item['user_id'] == $user_id;
        }); 

        $currentDate = now();
$filterSemuaMasuk = $comPemasukan;
$filterSemuaKeluar = $comPengeluaran;

// Clone $currentDate before applying subDays() or subMonths() methods
$currentDateForHariIniMas = clone $currentDate;
$currentDateFor7HariMas = clone $currentDate;
$currentDateFor30HariMas = clone $currentDate;
$currentDateFor90HariMas = clone $currentDate;
$currentDateFor12BulanMas = clone $currentDate;

$currentDateForHariIniKel = clone $currentDate;
$currentDateFor7HariKel = clone $currentDate;
$currentDateFor30HariKel = clone $currentDate;
$currentDateFor90HariKel = clone $currentDate;
$currentDateFor12BulanKel = clone $currentDate;

$filterHariIniMas = $comPemasukan->where('tanggal', $currentDateForHariIniMas->toDateString());
$filter7HariMas = $comPemasukan->whereBetween('tanggal', [$currentDateFor7HariMas->subDays(7)->toDateString(), $currentDate->toDateString()]);
$filter30HariMas = $comPemasukan->whereBetween('tanggal', [$currentDateFor30HariMas->subDays(30)->toDateString(), $currentDate->toDateString()]);
$filter90HariMas = $comPemasukan->whereBetween('tanggal', [$currentDateFor90HariMas->subDays(90)->toDateString(), $currentDate->toDateString()]);
$filter12BulanMas = $comPemasukan->whereBetween('tanggal', [$currentDateFor12BulanMas->subMonths(12)->toDateString(), $currentDate->toDateString()]);

$filterHariIniKel = $comPengeluaran->where('tanggal', $currentDateForHariIniKel->toDateString());
$filter7HariKel = $comPengeluaran->whereBetween('tanggal', [$currentDateFor7HariKel->subDays(7)->toDateString(), $currentDate->toDateString()]);
$filter30HariKel = $comPengeluaran->whereBetween('tanggal', [$currentDateFor30HariKel->subDays(30)->toDateString(), $currentDate->toDateString()]);
$filter90HariKel = $comPengeluaran->whereBetween('tanggal', [$currentDateFor90HariKel->subDays(90)->toDateString(), $currentDate->toDateString()]);
$filter12BulanKel = $comPengeluaran->whereBetween('tanggal', [$currentDateFor12BulanKel->subMonths(12)->toDateString(), $currentDate->toDateString()]);
// Define the filter type (Mingguan, Bulanan, Tahunan)
$filterType = $jenisFilter;

// Initialize variables to hold start and end dates
$startDate = null;
$endDate = null;

// Initialize variables to hold filtered results
$filterMingguanMas = null;
$filterBulananMas = null;
$filterTahunanMas = null;

$filterMingguanKel = null;
$filterBulananKel = null;
$filterTahunanKel = null;

if ($filterType === "Mingguan") {
    // Extract year and week number from "2024-W19"
    list($year, $week) = explode('-W', $filterValue);

    // Set start and end dates for the given week
    $startDate = Carbon::now()->setISODate($year, $week)->startOfWeek();
    $endDate = Carbon::now()->setISODate($year, $week)->endOfWeek();

    // Filter alldata by the calculated start and end dates for Mingguan
    $filterMingguanMas = $comPemasukan->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
    $filterMingguanKel = $comPengeluaran->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
} elseif ($filterType === "Bulanan") {
    // Extract year and month from "2024-05"
    list($year, $month) = explode('-', $filterValue);

    // Set start and end dates for the given month
    $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
    $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();

    // Filter alldata by the calculated start and end dates for Bulanan
    $filterBulananMas = $comPemasukan->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
    $filterBulananKel = $comPengeluaran->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
} elseif ($filterType === "Tahunan") {
    // Extract year from "2024"
    $year = $filterValue;

    // Set start and end dates for the given year
    $startDate = Carbon::createFromDate($year, 1, 1)->startOfYear();
    $endDate = Carbon::createFromDate($year, 12, 31)->endOfYear();

    // Filter alldata by the calculated start and end dates for Tahunan
    $filterTahunanMas = $comPemasukan->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
    $filterTahunanKel = $comPengeluaran->whereBetween('tanggal', [$startDate->toDateString(), $endDate->toDateString()]);
}



        
        // dd($filterTahunan);

        
        
        
        if ($jenisFilter == "Mingguan") {


            $groupedPemasukanData = $filterMingguanMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            
            // Grouping and Summing Pengeluaran Data
            $groupedPengeluaranData = $filterMingguanKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            





            
        } else if ($jenisFilter == "Bulanan") {
            
            
            $groupedPemasukanData = $filterBulananMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            
            // Grouping and Summing Pengeluaran Data
            $groupedPengeluaranData = $filterBulananKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            
        } else if ($jenisFilter == "Tahunan") {
            
            
            $groupedPemasukanData = $filterTahunanMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            
            // Grouping and Summing Pengeluaran Data
            $groupedPengeluaranData = $filterTahunanKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                $totalJumlah = $items->sum('jumlah');
                $jumlah_catatan = $items->count();
                return [
                    'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                    'total_jumlah' => $totalJumlah,
                    'jumlah_catatan' => $jumlah_catatan
                ];
            });
            
        } else if ($jenisFilter == "Kisaran") {
            // Initialize variables
            

            if ($filterValue == "semuaHari") {
                
                
                $groupedPemasukanData = $filterSemuaMasuk->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filterSemuaKeluar->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });

                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "iniHari") {
            
            
                $groupedPemasukanData = $filterHariIniMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filterHariIniKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });

                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "7Hari") {
            
            
                $groupedPemasukanData = $filter7HariMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filter7HariKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                // dd($cumulativeSaldoHarian);
            } else if ($filterValue == "30Hari") {
            
                $groupedPemasukanData = $filter30HariMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filter30HariKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                // dd($cumulativeSaldoHarian);
                
            } else if ($filterValue == "90Hari") {
            
            
                $groupedPemasukanData = $filter90HariMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filter90HariKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });

                // dd($cumulativeSaldoHarian);
                
            } else if ($filterValue == "12Bulan") {
            
                $groupedPemasukanData = $filter12BulanMas->groupBy('kategori_pemasukan.nama_kategori_pemasukan')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pemasukan']['nama_kategori_pemasukan'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });
                
                // Grouping and Summing Pengeluaran Data
                $groupedPengeluaranData = $filter12BulanKel->groupBy('kategori_pengeluaran.nama_kategori_pengeluaran')->map(function ($items) {
                    $totalJumlah = $items->sum('jumlah');
                    $jumlah_catatan = $items->count();
                    return [
                        'kategori' => $items->first()['kategori_pengeluaran']['nama_kategori_pengeluaran'],
                        'total_jumlah' => $totalJumlah,
                        'jumlah_catatan' => $jumlah_catatan
                    ];
                });

                // dd($cumulativeSaldoHarian);
            }
            
        }

        // Grouping and Summing Pemasukan Data


// Now, $groupedPemasukanData and $groupedPengeluaranData contain the grouped and summed data
// dd($groupedPemasukanData);

        $combinedData = $comPemasukan->merge($comPengeluaran);
        $alldata = $combinedData->sortByDesc('tanggal');

        

        // dd($groupedPengeluaranData);
        

        return view('statistik.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'groupedPemasukanData' => $groupedPemasukanData,
            'groupedPengeluaranData' => $groupedPengeluaranData,
            'comPemasukan' => $comPemasukan,
            'comPengeluaran' => $comPengeluaran,
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        // Redirect back to the index view with the form data
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
