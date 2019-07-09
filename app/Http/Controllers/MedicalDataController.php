<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Medical;

class MedicalDataController extends Controller
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
        
        return view('dashboard.medical');
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
            'bloodGroup' => 'required',
            'genotype' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'chestWidth' => 'required'
        ]);

        $medical = Medical::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'bloodGroup' => $request->bloodGroup,
                'genotype' => $request->genotype,
                'height' => $request->height,
                'weight' => $request->weight,
                'chestWidth' => $request->chestWidth
            ]
        );
        if($medical){
            return redirect()->route('showNOK')->with(['success' => 'Medical Data saved successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
