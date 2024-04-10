<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
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
        ])->get(env('API_URL')."/auth");
        if($response->status() == 200){
            if(isset($response['data']['user'])){
                $request->merge(['user' => $response['data']['user']]);
                if(isset($request->admin)){
                    unset($request->admin);
                }
                return $next($request);
            }
        }
        return redirect()->route('loginPage')->with(["toast" => ["type" => "error", "message" => $response["message"]]]);
    }
}
