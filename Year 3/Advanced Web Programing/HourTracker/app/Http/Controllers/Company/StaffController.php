<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Http\Controllers\Controller;
use App\Mail\Company\StaffApproved;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    public function index(){
        $company = Company::where('ownerUID', Auth::id())->first();
        $staff = User::where('company', $company->id)->with('ShiftPattern')->get();
        $activeStaff = $staff->where('companyStatus', 1);
        $staffToApprove = $staff->where('companyStatus', 0);
        $inactiveStaff = $staff->where('companyStatus', 2);
        return view('company.dashboard.users.index')->with([
            'staff'=> $staff, 
            'company' => $company,
            'activeStaff' => $activeStaff,
            'staffToApprove' => $staffToApprove,
            'inactiveStaff' => $inactiveStaff
        ]);
    }

    public function approve($id){
        $user = User::find($id);
        $user->companyStatus = 1;
        $user->save();
        Mail::to($user)->send(new StaffApproved);
        return back()->with('toast_succes', $user->firstName . ' registration request has been approved');
    }

    public function deny($id){
        $user = User::find($id);
        $user->companyStatus = 2;
        $user->save();
        return back()->with('toast_error', $user->firstName . ' registration request has been denied');
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->companyStatus = $request->status;
        $user->save();
        return back()->with('toast_succes', $user->firstName . ' has been made inactive');
    }

    public function reinstate($id){
        $user = User::find($id);
        $user->companyStatus = 1;
        $user->save();
        return back()->with('toast_error', $user->firstName . ' has been reinstated');
    }
}
