<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\State;
use App\Lga;
class ContactDataController extends Controller
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
        // return auth()->user()->contact->lga;
        if(!empty(auth()->user()->contact)){
            $selectedStateAndLGA = [
                'soo' => State::findOrfail(auth()->user()->contact->soo),
                'sor' => State::findOrfail(auth()->user()->contact->sor),
                'lga' => Lga::findOrfail(auth()->user()->contact->lga),
                'lgor' => Lga::findOrfail(auth()->user()->contact->lgor),
                'aoo' => Contact::where('aoo', auth()->user()->contact->aoo)->first()->aoo,
                'aor' => Contact::where('aor', auth()->user()->contact->aor)->first()->aor
            ];
        }else{
            $selectedStateAndLGA = [
                'soo' => 0,
                'sor' => 0,
                'lga' => 0,
                'lgor' => 0,
                'aoo' => '',
                'aor' => ''
            ];
        }

        // dd($selectedStateAndLGA);

        return view('dashboard.contact')->with('selectedStateAndLGA', $selectedStateAndLGA);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'soo' => 'required',
            'lga' => 'required',
            'aoo' => 'required',
            'sor' => 'required',
            'lgor' => 'required',
            'aor' => 'required'
        ]);
        
        $contact = Contact::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'soo' => $request->soo,
                'lga' => $request->lga,
                'aoo' => $request->aoo,
                'sor' => $request->sor,
                'lgor' => $request->lgor,
                'aor' => $request->aor
            ]
        );
        if($contact){
            return redirect()->route('showMedical')->with(['success' => 'Contact Data saved successfully!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
