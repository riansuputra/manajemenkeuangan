<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CatatanUmumController extends Controller
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
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/catatan'),
        ]);
        if ($responses[0]->successful()){
            $catatanData = $responses[0]->json()['data']['catatan'];
            return view('catatan.umum', [
                'user' => $request->auth['user'],
                'catatanData' => $catatanData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function store(Request $request)
    {
        $input = [
            'user_id' => $request->auth['user']['id'], 
            'judul' => $request->judul,
            'tipe' => $request->tipe,
            'warna' => $request->warna,
            'catatan' => $request->catatan, 
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