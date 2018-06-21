<?php

namespace RecHum\Http\Middleware;

use Closure;

class Admin
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
        if($request->user()->tipo == "USR"){
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/usuarios');
            }
        } 
        return $next($request);
    }
}
