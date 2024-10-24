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
            $combinedData2 = $this->applyDateFilters($combinedData3, $jenisFilter, $filterValue, $filterValue2);

            $startDate = $combinedData2['startDate'];
            $endDate = $combinedData2['endDate'];

            $combinedData = $combinedData2['data'];
            $combinedData = $combinedData->sort(function ($a, $b) {
                $aTimestamp = strtotime($a['created_at']);
                $bTimestamp = strtotime($b['created_at']);
                return $bTimestamp - $aTimestamp;
            });

            $tanggalData = $combinedData->sortByDesc('tanggal');
            $groupedData = $tanggalData->groupBy('tanggal');
            $summedData = $groupedData->map(function ($group) {
                $totalPemasukan = $group->where('kategori_pemasukan_id')->sum('jumlah');
                $totalPengeluaran = $group->where('kategori_pengeluaran_id')->sum('jumlah');
                $totalJumlah = $totalPemasukan - $totalPengeluaran;
            
                return $group->map(function ($item) use ($totalJumlah) {
                    $item['total_jumlah'] = $totalJumlah;
                    return $item;
                });
            });
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

        return redirect()->route('catatanHarian')->with([
            'jenisFilter' => $jenisFilter,
            'filterValue' => $filterValue,
            'filterValue2' => $filterValue2,
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
        $apiUrlPemasukan = env('API_URL').'/pemasukan';
        $apiUrlPengeluaran = env('API_URL').'/pengeluaran';
        $apiKey = env('API_KEY');        

        if($request->jenis == 1) {
            $jenis = 'kategori_pemasukan_id';
            $jenisapi = $apiUrlPemasukan;
        }else if ($request->jenis == 2){
            $jenis = 'kategori_pengeluaran_id';
            $jenisapi = $apiUrlPengeluaran;
        }

        $input = array(
            'user_id' => $request->auth['user']['id'],
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
        $jenisedit2 = $request->input('jenisedit2'.$id);

        if($jenisedit2 != $request->jenisedit) {
            if($request->jenisedit == 1) {
                $apiUrlPemasukanDel = env('API_URL').'/pemasukan/'.$id;
                $jenis = 'kategori_pemasukan_id';
                $jenisapiDel = $apiUrlPemasukanDel;
            }else if ($request->jenisedit == 2){
                $apiUrlPengeluaranDel = env('API_URL').'/pengeluaran/'.$id;
                $jenis = 'kategori_pemasukan_id';
                $jenisapiDel = $apiUrlPengeluaranDel;
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'x-api-key' => env('API_KEY'),
                'Authorization' => 'Bearer ' . $request->auth['token'],
                'user-type' => $request->auth['user_type'],
            ])->delete($jenisapiDel);

            if($jenisedit2 == 1) {
                $apiUrlPemasukan = env('API_URL').'/pemasukan';
                $jenis = 'kategori_pemasukan_id';
                $jenisapi = $apiUrlPemasukan;
            }else if ($jenisedit2 == 2){
                $apiUrlPengeluaran = env('API_URL').'/pengeluaran';
                $jenis = 'kategori_pengeluaran_id';
                $jenisapi = $apiUrlPengeluaran;
            }

            $input = array(
                'user_id' => $request->auth['user']['id'],
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
                $apiUrlPemasukan = env('API_URL').'/pemasukan/'.$id;
                $jenis = 'kategori_pemasukan_id';
                $jenisapi = $apiUrlPemasukan;
            }else if ($request->jenisedit == 2){
                $apiUrlPengeluaran = env('API_URL').'/pengeluaran/'.$id;
                $jenis = 'kategori_pengeluaran_id';
                $jenisapi = $apiUrlPengeluaran;
            }
    
            $input = array(
                'user_id' => $request->auth['user']['id'],
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
        $apiUrlPemasukan = env('API_URL').'/pemasukan/'.$id;
        $apiUrlPengeluaran = env('API_URL').'/pengeluaran/'.$id;
        $apiKey = env('API_KEY');        

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