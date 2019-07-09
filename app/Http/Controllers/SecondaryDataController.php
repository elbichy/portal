<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Secondary;
class SecondaryDataController extends Controller
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
        return view('dashboard.secondary');
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
            'certType' => 'required',
            'nameOfSchool' => 'required',
            'location' => 'required',
            'secStartYear' => 'required',
            'secEndYear' => 'required'
        ]);

        $primary = Secondary::create([
            'user_id' => auth()->user()->id,
            'certType' => $request->certType,
            'nameOfSchool' => $request->nameOfSchool,
            'location' => $request->location,
            'secStartYear' => $request->secStartYear,
            'secEndYear' => $request->secEndYear
        ]);

        $count = count(auth()->user()->secondary);
        if($primary){
            return response()->json(['success' => 'Primary School Data added successfully!', 'count' => $count, 'data' => $primary]);
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
        $record = User::find(auth()->user()->id)->secondary()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
