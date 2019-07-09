<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Primary;
class PrimaryDataController extends Controller
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
        return view('dashboard.primary');
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
            'priStartYear' => 'required',
            'priEndYear' => 'required'
        ]);

        $primary = Primary::create([
            'user_id' => auth()->user()->id,
            'certType' => $request->certType,
            'nameOfSchool' => $request->nameOfSchool,
            'location' => $request->location,
            'priStartYear' => $request->priStartYear,
            'priEndYear' => $request->priEndYear
        ]);

        $count = count(auth()->user()->primary);
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
        $record = User::find(auth()->user()->id)->primary()->where('id', $id)->delete();
        return response()->json(['status' => $record, 'id' => $id]);
    }
}
