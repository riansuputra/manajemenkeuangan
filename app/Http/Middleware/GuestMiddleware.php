<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer ' . $request->cookie('token')
        ])->get(env('API_URL')."/auth");

        if($response->status() == 200){
            if(isset($response['data']['admin']) || isset($response['data']['user'])){
                // return redirect()->route('beranda');
                return redirect()->back()->with(["toast" => ["type" => "error", "message" => "Silahkan Logout"]]);
            }
        }
        return $next($request);
    }
}
