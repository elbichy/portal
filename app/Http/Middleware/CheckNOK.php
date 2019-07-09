<?php

namespace App\Http\Middleware;

use Closure;

class CheckNOK
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
        if(count(auth()->user()->nextOfKin) != 2){
            return redirect()->route('showNOK'); 
        }
        return $next($request);
    }
}
