<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PengaturanController extends Controller
{
    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }

    public function indexPermintaanKategori(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/permintaan-kategori'),
        ]);
        
        if ($responses[0]->successful()) {
           
            $permintaan = collect($responses[0]->json()['data']['permintaan'])
                        ->sortByDesc('created_at')
                        ->values()
                        ->all();

            return view('pengaturan.permintaan_kategori', [
                'user' => $request->auth['user'],
                'permintaan' => $permintaan,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function storePermintaanKategori(Request $request)
    {
        $input = array(
            'user_id' => $request->auth['user']['id'],
            'nama_kategori' => $request->nama_kategori,
            'tipe_kategori' => $request->tipe_kategori,
            'cakupan_kategori' => $request->cakupan_kategori,
        );

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/permintaan-kategori-store', $input);

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('permintaan.kategori')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function indexInformasiAkun(Request $request)
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/permintaan-kategori'),
        ]);
        if ($responses[0]->successful()) {
           
            $permintaan = collect($responses[0]->json()['data']['permintaan'])
                        ->sortByDesc('created_at')
                        ->values()
                        ->all();
            

            return view('pengaturan.informasi_akun', [
                'user' => $request->auth['user'],
                'permintaan' => $permintaan,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }
    }

    public function indexTentang(Request $request)
    {
        return view('pengaturan.tentang', [
            'user' => $request->auth['user'],
        ]);
    }

    public function destroyPortofolio(Request $request)
    {
        $response = Http::withHeaders($this->getHeaders($request))
                        ->delete(env('API_URL') . '/hapus-portofolio');

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('informasi.akun')->with('success', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function destroyKeuangan(Request $request)
    {
        $response = Http::withHeaders($this->getHeaders($request))
                        ->delete(env('API_URL') . '/hapus-keuangan');

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('informasi.akun')->with('success', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function destroyCatatan(Request $request)
    {
        $response = Http::withHeaders($this->getHeaders($request))
                        ->delete(env('API_URL') . '/hapus-catatan');

        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('informasi.akun')->with('success', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function updateUser(Request $request)
    {
        // dd($request);
        $input = [
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ];
    
        $response = Http::withHeaders($this->getHeaders($request))
                        ->post(env('API_URL') . '/update/', $input);
    
        if ($response->status() == 200) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('informasi.akun')->with('success', $response->json()['message'] ?? 'Data berhasil diubah');
        } elseif ($response->failed() && $response->json('errors')) {
            return back()->withErrors($response->json()['errors'])->withInput();
        } else {
            return back()->with('error', $response->json()['message'] ?? 'Terjadi kesalahan pada server')->withInput();
        }
    }
}