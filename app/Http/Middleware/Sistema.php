<?php

namespace restaurant\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
class Sistema extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,... $guards)
    {
        $this->authenticate($request, $guards);
        return $next($request);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('sis-login');
        }
    }
    private function permisoadmin()
    {
        return session()->get('rol_nombre') == 'administrador';
    }
}
