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
        if($request->hasCookie('auth')){
            $auth = unserialize($request->cookie('auth'));
            if($auth['user_type'] == 'user'){
                $request->merge(['auth' => $auth]);
                return $next($request);
            }
        }
        return redirect()->route('login.page');
    }
}
