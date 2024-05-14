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

    public function index(Request $request)
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
            'user_id' => $request->auth['user']['user_id'],
            'tanggal' => $request->tanggaledit,
            'jumlah' => $request->jumlah1edit,
            'catatan' => $request->catatanedit,
            $jenis => $request->kategoriedit,
        );
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => $apiKey,
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
