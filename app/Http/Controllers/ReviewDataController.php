<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\State;
use App\Lga;
class ReviewDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty(auth()->user()->contact)){
            $selectedStateAndLGA = [
                'soo' => State::findOrfail(auth()->user()->contact->soo),
                'sor' => State::findOrfail(auth()->user()->contact->sor),
                'lga' => Lga::findOrfail(auth()->user()->contact->lga),
                'lgor' => Lga::findOrfail(auth()->user()->contact->lgor)
            ];
        }else{
            $selectedStateAndLGA = [
                'soo' => 0,
                'sor' => 0,
                'lga' => 0,
                'lgor' => 0
            ];
        }
        
        return view('dashboard.review')->with('selectedStateAndLGA', $selectedStateAndLGA);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stateAbr = State::find(auth()->user()->contact->soo)->state_name;
        $stateAbr = substr($stateAbr, 0, 3);
        $stateAbr = strtoupper($stateAbr);
        
        if($request->certify == 'on'){
            $user = User::find(auth()->user()->id);
            $user->appNum = 'NSCDC/REC/2019/'.auth()->user()->rank->acronym.'/'.$stateAbr.'/'.auth()->user()->id;
            $user->hasSubmitted = 1;
            if($user->save()){
                return redirect()->route('applicant')->with(['success' => 'You have successfully completed your application']);
            }
        }else{
            return back()->with(['error' => 'You have to tick the check box first']);
        }
    }
}
