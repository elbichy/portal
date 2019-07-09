<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NextOfKin;
class NOKDataController extends Controller
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
        return view('dashboard.nok');
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
            'nokfn' => 'required',
            'nokg' => 'required',
            'nokr' => 'required',
            'noka' => 'required',
            'nokp' => 'required'
        ]);

        $nextofkin = NextOfKin::create([
            'user_id' => auth()->user()->id,
            'nokfn' => $request->nokfn,
            'nokg' => $request->nokg,
            'nokr' => $request->nokr,
            'noka' => $request->noka,
            'nokp' => $request->nokp
        ]);
        $count = count(auth()->user()->nextOfKin);
        if($nextofkin){
            return response()->json(['success' => 'Next of Kin Data added successfully!', 'count' => $count, 'data' => $nextofkin]);
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
        $record = User::find(auth()->user()->id)->nextOfKin()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
