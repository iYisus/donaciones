<?php

namespace IPNVZLA\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        $role = $this->auth->user()->FK_ROL_ID;
            if ($role == 2 or $role == 3){
                return $next($request);
            }
            if ($role == 1){
                return redirect('/');
            }
        return redirect('/admin')->with('estatus',500)->with( "mensaje", 'No autorizado.!');
    }
}
