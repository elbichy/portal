<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompleted
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
            return redirect()->route('applicant')->with(['error' => 'You have to upload your Passport Photograph']); 
        }elseif(auth()->user()->personal == NULL){
            return redirect()->route('showPersonal')->with(['error' => 'You have provide the following personal info']);
        }elseif(auth()->user()->contact == NULL){
            return redirect()->route('showContact')->with(['error' => 'You have provide the following contact info']); 
        }elseif(auth()->user()->medical == NULL){
            return redirect()->route('showMedical')->with(['error' => 'You have provide the following medical records']);
        }elseif(count(auth()->user()->nextOfKin) != 2){
            return redirect()->route('showNOK')->with(['error' => 'You have provide (2) Next of Kin records']); 
        }elseif(count(auth()->user()->primary) == 0){
            return redirect()->route('showPrimary')->with(['error' => 'You have provide your Primary school records']);
        }elseif(count(auth()->user()->secondary) == 0){
            return redirect()->route('showSecondary')->with(['error' => 'You have provide your Secondary school records']);
        }elseif(auth()->user()->cadre_id == 1){
            if(count(auth()->user()->tertiary) == 0){
                return redirect()->route('showTertiary')->with(['error' => 'You have provide your Tertiary institution records']); 
            }
        }
        return $next($request);
    }
}
