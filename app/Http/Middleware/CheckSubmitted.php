<?php

namespace App\Http\Middleware;

use Closure;

class CheckSubmitted
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
        if (auth()->user()->hasSubmitted == 1) {
            return redirect()->route('applicant')->with(['info' => 'You have completed your application, send all of your feedbacks to our E-mail.']);
        }
        return $next($request);
    }
}
