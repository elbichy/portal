<?php

namespace App\Http\Middleware;

use Closure;

class CheckTertiary
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
        if(auth()->user()->cadre_id == 1){
            if(count(auth()->user()->tertiary) == 0){
                return redirect()->route('showTertiary'); 
            }
        }
        return $next($request);
    }
}
