<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if($request->hasCookie('auth')){
            $auth = unserialize($request->cookie('auth'));
            if($auth['user_type'] == 'admin' || $auth['user_type'] == 'user'){
                $request->merge(['auth' => $auth]);
                return $next($request);
            }
        }
        return redirect()->back();
        // return redirect()->route('index');

        // $token = request()->cookie('token');
        // $response = Http::withHeaders([
        //     'Accept' => 'application/json',
        //     'x-api-key' => env('API_KEY'),
        //     'Authorization' => 'Bearer '.$token,
        //     // 'Authorization' => 'Bearer ' . $request->cookie('token')
        // ])->get(env('API_URL')."/auth");
        
        // if($response->status() == 200){
        //     if(isset($response['data']['admin'])){
        //         $request->merge(['admin' => $response['data']['admin']]);
        //         if(isset($request->user)){
        //             unset($request->user);
        //         }
        //         return $next($request);
        //     }
        //     if(isset($response['data']['user'])){
        //         $request->merge(['user' => $response['data']['user']]);
        //         if(isset($request->admin)){
        //             unset($request->admin);
        //         }
                
        //         return $next($request);
        //     }
        // }
        // return redirect()->back()->with(["toast" => ["type" => "error", "message" => $response["message"]]]);
    }
}
