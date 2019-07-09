<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    public function login(Request $request){

        $errors = new MessageBag; // initiate MessageBag

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password],  $request->has('remember'))){
            return redirect()->intended('applicant');
        }

        $errors = new MessageBag([
            'details' => ['Email and/or password entered are incorrect.']
        ]);
        return redirect('/#formArea')->withErrors($errors, 'login')->withInput(Input::except('password'));
    }
    
}
