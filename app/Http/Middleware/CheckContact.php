<?php

namespace App\Http\Middleware;

use Closure;

class CheckContact
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
        if(auth()->user()->contact == NULL){
            return redirect()->route('showContact'); 
        }
        return $next($request);
    }
}
