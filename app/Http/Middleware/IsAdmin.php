<?php

namespace BuscoMoto\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class IsAdmin
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

        if(Auth::user()->tipo!="admin" )
        {
            var_dump("SI");
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/login'); 
            }
        }
        return $next($request);
       



    }
}
