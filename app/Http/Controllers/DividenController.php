<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class DividenController extends Controller
{
    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }

    public function index(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/dividen'),
        ]);
        if ($responses[0]->successful()){
            $dividenData = $responses[0]->json()['data']['dividen'];
            return view('dividen.index', [
                'user' => $request->auth['user'],
                'dividenData' => $dividenData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $input = [
            'user_id' => $request->auth['user']['id'], 
            'emiten' => $request->emiten,
            'dividen_per_saham' => $request->dividen_per_saham,
            'dividen_yield' => $request->dividen_yield,
            'cum_date' => $request->cum_date,
            'payment_date' => $request->payment_date,
        ];
    
        $response = Http::withHeaders($this->getHeaders($request))
                        ->post(env('API_URL') . '/catatan', $input);
    
        if ($response->status() == 201) {
            return redirect()->route('catatanUmum')->with('success', $response->json()['message'] ?? 'Data berhasil disimpan');
        } elseif ($response->failed() && $response->json('errors')) {
            return back()->withErrors($response->json()['errors'])->withInput();
        } else {
            return back()->with('error', $response->json()['message'] ?? 'Terjadi kesalahan pada server')->withInput();
        }
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
        $input = [
            'user_id' => $request->auth['user']['id'], 
            'judul' => $request->juduledit,
            'tipe' => $request->tipeedit,
            'warna' => $request->warnaedit,
            'catatan' => $request->catatanedit, 
        ];
    
        $response = Http::withHeaders($this->getHeaders($request))
                        ->patch(env('API_URL') . '/catatan/'.$id, $input);
    
        if ($response->status() == 200) {
            return redirect()->route('catatanUmum')->with('success', $response->json()['message'] ?? 'Data berhasil diubah');
        } elseif ($response->failed() && $response->json('errors')) {
            return back()->withErrors($response->json()['errors'])->withInput();
        } else {
            return back()->with('error', $response->json()['message'] ?? 'Terjadi kesalahan pada server')->withInput();
        }
    }

  
    public function destroy(Request $request, string $id)
    {
        $response = Http::withHeaders($this->getHeaders($request))
                        ->delete(env('API_URL') . '/catatan/'.$id);

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('catatanUmum')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }
}
