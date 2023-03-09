<?php

namespace App\Http\Middleware;

use Closure;

class CustomErrorPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
    
        if ($response->status() == 403) {
            return response()->view('errors.403', [], 403);
        }
    
        return $response;
    }
}
