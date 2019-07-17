<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use App\DataTables\UserDataTable;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    // DASHBOARD/HOME
    public function dashboard(){
        return view('admin.dashboard');
    }



    // PROCESS OF SHORTLISTING CANDIDATES
    public function shortListApplicants(Request $request){
        $applicants = $request->applicants;
        $users = User::find($applicants);
        $successCount = 0;
        foreach($users as $user){
            $user->isShortlisted = 1;
            if($user->save()){
                $successCount++;
            }
        }
        if($successCount > 0 && $successCount == count($applicants)){
            return response()->json(['status' => true, 'message' => 'Candidates shortlisted successfully!']);
        }
        
    }



    // DISPLAYS ASC I CANDIDATES
    public function showASCI(){
        return view('admin.asci');
    }
    public function getASCI()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 1
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS ASC II CANDIDATES
    public function showASCII(){
        return view('admin.ascii');
    }
    public function getASCII()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 2
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS IC CANDIDATES
    public function showIC(){
        return view('admin.ic');
    }
    public function getIC()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 3
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS AIC CANDIDATES
    public function showAIC(){
        return view('admin.aic');
    }
    public function getAIC()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 4
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS CAI CANDIDATES
    public function showCAI(){
        return view('admin.cai');
    }
    public function getCAI()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 5
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS CAII CANDIDATES
    public function showCAII(){
        return view('admin.caii');
    }
    public function getCAII()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 6
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS CAIII CANDIDATES
    public function showCAIII(){
        return view('admin.caiii');
    }
    public function getCAIII()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 0,
            'rank_id' => 7
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make();
    }



    // DISPLAYS SHORTLISTED CANDIDATES PAGE
    public function showShortlisted(){
        return view('admin.shortlisted');
    }
    public function getShortlisted()
    {
        $users = User::with(['personal', 'contact'])->where([
            'isAdmin' => 0,
            'hasSubmitted' => 1,
            'isShortlisted' => 1
        ])->select('users.*');
        return Datatables::of($users)
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('checkbox', function($user) {
                    return '<input type="checkbox" name="applicantCheckbox[]" class="applicantCheckbox" value="'.$user->id.'" />';
                })
                ->rawColumns(['checkbox'])
                ->make(true);
    }
}
