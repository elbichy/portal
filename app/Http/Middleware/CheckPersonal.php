<?php

namespace App\Http\Middleware;

use Closure;

class CheckPersonal
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
        if(auth()->user()->personal == NULL){
            return redirect()->route('showPersonal'); 
        }
        return $next($request);
    }
}
