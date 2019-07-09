<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Tertiary;
class TertiaryDataController extends Controller
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
        if (Gate::allows('ca')) {
            return redirect()->route('showCertification');
        }
        return view('dashboard.tertiary');
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
            'qualification' => 'required',
            'institution' => 'required',
            'location' => 'required',
            'course' => 'required',
            'grade' => 'required',
            'TstartYear' => 'required',
            'TendYear' => 'required'
        ]);

        $tertiary = Tertiary::create([
            'user_id' => auth()->user()->id,
            'qualification' => $request->qualification,
            'institution' => $request->institution,
            'location' => $request->location,
            'course' => $request->course,
            'grade' => $request->grade,
            'TstartYear' => $request->TstartYear,
            'TendYear' => $request->TendYear
        ]);

        $count = count(auth()->user()->tertiary);
        if($tertiary){
            return response()->json(['success' => 'Primary School Data added successfully!', 'count' => $count, 'data' => $tertiary]);
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
        $record = User::find(auth()->user()->id)->tertiary()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
