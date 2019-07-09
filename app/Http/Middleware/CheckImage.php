<?php

namespace App\Http\Middleware;

use Closure;

class CheckImage
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
        if(auth()->user()->image == NULL){
            return redirect()->route('applicant'); 
        }
        return $next($request);
    }
}
