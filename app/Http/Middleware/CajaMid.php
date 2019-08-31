<?php

namespace restaurant\Http\Middleware;

use Closure;
use Auth;

class CajaMid
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
        if(Auth::user()->tipo->nombre == "ADMIN" || Auth::user()->tipo->nombre == "CAJERO" ){
            return $next($request);
        }
        return $next($request);
    }
}
