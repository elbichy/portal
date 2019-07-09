<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Certification;
class CertificationDataController extends Controller
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
        return view('dashboard.certification');
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
            'institute' => 'required',
            'location' => 'required',
            'title' => 'required',
            'startdate' => 'required',
            'enddate' => 'required'
        ]);
        
        $certification = Certification::create([
            'user_id' => auth()->user()->id,
            'institute' => $request->institute,
            'location' => $request->location,
            'title' => $request->title,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate
        ]);

        if($certification){
            return response()->json(['success' => 'Next of Kin Data added successfully!', 'data' => $certification]);
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
        $record = User::find(auth()->user()->id)->certification()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
