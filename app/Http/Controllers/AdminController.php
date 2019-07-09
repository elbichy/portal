<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function dashboard(){
        return view('dashboard.adminDashboard');
    }
    public function applicants(){
        return view('dashboard.adminApplicants');
    }
}
