<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class CatatanController extends Controller
{
    public function index(Request $request) {
        $res = Parent::getDataLogin($request);

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

        $combinedData = $combinedDataPemasukan->merge($combinedDataPengeluaran);
        $alldata = $combinedData->sortByDesc('tanggal');
        

        return view('catatan.index', [
            'user' => $res['user'],
            'pemasukan' => $pemasukanData,
            'pengeluaran' => $pengeluaranData,
            'alldata' => $alldata,
            'combinedDataPemasukan' => $combinedDataPemasukan,
            'combinedDataPengeluaran' => $combinedDataPengeluaran,
        ]);
    }

    public function indexMingguan(Request $request) {
        $res = Parent::getDataLogin($request);
    
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
    
        $combinedData = $pemasukanData->merge($pengeluaranData);
    
        $groupedData = $combinedData->groupBy(function ($item) {
            $carbonDate = Carbon::parse($item['tanggal']);
            return $carbonDate->year . '-' . $carbonDate->weekOfYear;
        })->map(function ($items) {
            $pemasukanSum = $items->whereNotNull('id_pemasukan')->sum('jumlah');
            $pengeluaranSum = $items->whereNotNull('id_pengeluaran')->sum('jumlah');

            // Get start and end dates of the week
            $weekStartDate = Carbon::parse($items->first()['tanggal'])->startOfWeek();
            $weekEndDate = Carbon::parse($items->first()['tanggal'])->endOfWeek();

            // Check if start and end dates belong to the same ISO week
            $weekNumber = $weekStartDate->weekOfYear;
            if ($weekStartDate->weekOfYear != $weekEndDate->weekOfYear) {
                $weekNumber .= ' - ' . $weekEndDate->weekOfYear;
            }

            return [
                'id_pemasukan' => $items->pluck('id_pemasukan')->toArray(),
                'id_pengeluaran' => $items->pluck('id_pengeluaran')->toArray(),
                'minggu' => 'Minggu Ke-' . $weekNumber, // Change "Week" to "Minggu Ke-"
                'tahun' => $weekStartDate->year,
                'jumlah_pemasukan' => $pemasukanSum,
                'jumlah_pengeluaran' => $pengeluaranSum,
            ];
        });

        $sortedData = $groupedData->sortByDesc(function ($item) {
            $weekYearString = explode('-', $item['minggu']); // Explode the week-year string
        
            // Check if the exploded array has at least two parts
            if (count($weekYearString) < 2) {
                return 0; // Return 0 or another default value if the format is incorrect
            }
        
            $weekYear = $weekYearString[0]; // Extract the week-year string
        
            // Check if the week-year string contains 'W' to split week and year
            if (!strpos($weekYear, 'W')) {
                return 0; // Return 0 or another default value if the format is incorrect
            }
        
            $parts = explode('W', $weekYear);
        
            // Check if the exploded array has exactly two parts after 'W'
            if (count($parts) != 2) {
                return 0; // Return 0 or another default value if the format is incorrect
            }
        
            $weekNumber = $parts[1]; // Extract the week number
            $year = $weekYearString[1]; // Extract the year
        
            return Carbon::parse($year . '-W' . $weekNumber)->timestamp;
        });
        
    
        return view('catatan.indexMingguan', [
            'user' => $res['user'],
            'sortedData' => $sortedData,
        ]);
    }
    

    public function indexBulanan(Request $request) {
        $res = Parent::getDataLogin($request);
    
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
    
        $combinedData = $pemasukanData->merge($pengeluaranData);
    
        $groupedData = $combinedData->groupBy(function ($item) {
            return Carbon::parse($item['tanggal'])->format('Y-m');
        })->map(function ($items) {
            $pemasukanSum = $items->whereNotNull('id_pemasukan')->sum('jumlah');
            $pengeluaranSum = $items->whereNotNull('id_pengeluaran')->sum('jumlah');
    
            return [
                'id_pemasukan' => $items->pluck('id_pemasukan')->toArray(),
                'id_pengeluaran' => $items->pluck('id_pengeluaran')->toArray(),
                'bulan' => Carbon::parse($items->first()['tanggal'])->format('F'),
                'tahun' => Carbon::parse($items->first()['tanggal'])->year,
                'jumlah_pemasukan' => $pemasukanSum,
                'jumlah_pengeluaran' => $pengeluaranSum,
            ];
        });
    
        $sortedData = $groupedData->sortByDesc(function ($item) {
            return Carbon::parse($item['tahun'] . '-' . Carbon::parse($item['bulan'])->format('m'));
        });

        return view('catatan.indexBulanan', [
            'user' => $res['user'],
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
            'user_id' => $res['user']['user_id'],
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah1,
            'catatan' => $request->catatan,
            $jenis => $request->kategori,
        );
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => $apiKey,
            'Authorization' => 'Bearer ' . request()->cookie('token')
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
        // dd($id);

        $apiUrlPemasukan = env('API_URL').'/pemasukans/'.$id;
        $apiUrlPengeluaran = env('API_URL').'/pengeluarans/'.$id;
        $apiKey = env('API_KEY');        
        $res = Parent::getDataLogin($request);

        if($request->jenisedit == 1) {
            $jenis = 'id_kategori_pemasukan';
            $jenisapi = $apiUrlPemasukan;
        }else if ($request->jenisedit == 2){
            $jenis = 'id_kategori_pengeluaran';
            $jenisapi = $apiUrlPengeluaran;
        }

        $input = array(
            'user_id' => $res['user']['user_id'],
            'tanggal' => $request->tanggaledit,
            'jumlah' => $request->jumlah1edit,
            'catatan' => $request->catatanedit,
            $jenis => $request->kategoriedit,
        );
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => $apiKey,
            'Authorization' => 'Bearer ' . request()->cookie('token')
        ])->patch($jenisapi, $input);

        if($response->status() == 200){
            return redirect()->route('catatanHarian')->with('success',$response["message"]);
        }else if(!empty($response["errors"])){
            return back()->with('success',$response["message"]);
        }else{
            return back()->with('success',$response["message"]);
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
            'Authorization' => 'Bearer ' . request()->cookie('token')
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
