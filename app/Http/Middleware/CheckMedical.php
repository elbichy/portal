<?php

namespace App\Http\Middleware;

use Closure;

class CheckMedical
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
        if(auth()->user()->medical == NULL){
            return redirect()->route('showMedical'); 
        }
        return $next($request);
    }
}
