<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Personal;
class PersonalDataController extends Controller
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
        return view('dashboard.personal');
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
            'gender' => 'required|string',
            'dob' => 'required|date',
            'maritalStatus' => 'required|string',
            'tribe' => 'required|string',
            'religion' => 'required|string'
        ]);

        $personal = Personal::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [
                'othername' => $request->othername,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'maritalStatus' => $request->maritalStatus,
                'tribe' => $request->tribe,
                'religion' => $request->religion
            ]
        );
        
        if($personal){
            return redirect()->route('showContact')->with(['success' => 'Persona Data saved successfully!']);
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
