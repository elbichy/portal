<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
use App\Lga;
class PrintoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function applicationForm()
    {
        if(!empty(auth()->user()->contact)){
            $data = [
                'soo' => State::findOrfail(auth()->user()->contact->soo),
                'sor' => State::findOrfail(auth()->user()->contact->sor),
                'lga' => Lga::findOrfail(auth()->user()->contact->lga),
                'lgor' => Lga::findOrfail(auth()->user()->contact->lgor)
            ];
        }else{
            $data = [
                'soo' => 0,
                'sor' => 0,
                'lga' => 0,
                'lgor' => 0
            ];
        }
        
        return view('dashboard.application-form')->with('data', $data);
    }
    
    
    public function refereeForm()
    {
        
    }
    
}
