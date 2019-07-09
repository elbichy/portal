<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Experience;
class ExperienceDataController extends Controller
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
        return view('dashboard.experience');
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
            'organisation' => 'required',
            'location' => 'required',
            'role' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);
        
        $experience = Experience::create([
            'user_id' => auth()->user()->id,
            'organisation' => $request->organisation,
            'location' => $request->location,
            'role' => $request->role,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate
        ]);

        if($experience){
            return response()->json(['success' => 'Experience Data added successfully!', 'data' => $experience]);
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
        $record = User::find(auth()->user()->id)->experience()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
