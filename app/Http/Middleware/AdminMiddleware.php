<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = request()->cookie('token');
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'x-api-key' => env('API_KEY'),
            'Authorization' => 'Bearer '. $token,
            // 'Authorization' => 'Bearer ' . $request->cookie('token')
        ])->post(env('API_URL')."/auth");
        if($response->status() == 200){
            if(isset($response['data']['admin'])){
                $request->merge(['admin' => $response['data']['admin']]);
                if(isset($request->user)){
                    unset($request->user);
                }
                return $next($request);
            }
        }
        return redirect()->back()->with(["toast" => ["type" => "error", "message" => $response["message"]]]);
    }
}
