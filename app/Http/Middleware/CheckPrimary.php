<?php

namespace App\Http\Middleware;

use Closure;

class CheckPrimary
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
        if(count(auth()->user()->primary) == 0){
            return redirect()->route('showPrimary'); 
        }
        return $next($request);
    }
}
