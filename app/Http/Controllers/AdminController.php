<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;

class AdminController extends Controller
{
    private function getHeaders($request) {
        return [
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->auth['admin']);
        return view('layouts.admin', [
            'admin' => $request->auth['admin'],
        ]);
    }

    public function dashboard(Request $request)
    {
        // dd($request->auth['admin']);
        return view('admin.dashboard.index', [
            'admin' => $request->auth['admin'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function categoryRequests(Request $request)
    {
        // dd($request);
        // dd($request->auth['user_type']);

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withHeaders($this->getHeaders($request))->get(env('API_URL') . '/permintaan-kategori-admin'),
        ]);

        // dd($responses);
    
        if ($responses[0]->successful()) {
            $categoryRequestData = collect($responses[0]->json()['data']['PermintaanKategori'])
                        ->sortByDesc('created_at')
                        ->values()
                        ->all();

            // dd($categoryRequestData);

            return view('admin.kategori.index', [
            'admin' => $request->auth['admin'],

                'categoryRequestData' => $categoryRequestData,
            ]);
        } else {
            abort(500, 'Failed to fetch data from API');
        }

        
    }

    

    public function approve(Request $request, $id) {
        // dd($id);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/category-requests/'.$id.'/approve');

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('categoryRequests')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
    }

    public function reject(Request $request, $id) {
        // dd($id);
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->auth['token'],
            'user-type' => $request->auth['user_type'],
        ])->post(env('API_URL') . '/category-requests/'.$id.'/reject');
        

        if ($response->status() == 201) {
            $this->updateAuthCookie($request->auth, $response['auth']);
            return redirect()->route('categoryRequests')->with('success', $response["message"]);
        } else if (!empty($response["errors"])) {
            return back()->with('error', $response["message"]);
        } else {
            return back()->with('error', $response["message"]);
        }
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
