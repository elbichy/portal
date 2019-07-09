<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\State;
class ApplicantController extends Controller
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
    public function index()
    {
        if(auth()->user()->isAdmin == 1){
            return redirect()->route('adminDashboard');
        }
        
        if(auth()->user()->contact != NULL){
            $state = State::find(auth()->user()->contact->soo)->state_name;
            $state = substr($state, 0, 3);
            $state = strtoupper($state);
        }else{
            $state = 'NA';
        }
        $appNum = 'NSCDC/REC/2019/'.auth()->user()->rank->acronym.'/'.$state.'/'.auth()->user()->id;
        return view('dashboard.dashboard')->with('appNum', $appNum);
    }
    
    
    public function store(Request $request)
    { 
        if ($image = $request->file('image')) {

            $val = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,|max:80',
            ]);
            $passport = 'passport_'.auth()->user()->id.'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/applicants/'.auth()->user()->id, $passport);
            
        }
        $user = User::find(auth()->user()->id);
        $user->image = $passport;
        if($user->save()){
            return redirect()->route('showPersonal')->with(['success' => 'Image uploaded successfully!']);
        }else{
            return back()->with(['error' => 'Something went wrong! try again later!']);
        }
    }
}
