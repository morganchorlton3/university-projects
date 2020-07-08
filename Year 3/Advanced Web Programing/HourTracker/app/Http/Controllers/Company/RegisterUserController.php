<?php

namespace App\Http\Controllers\Company;

use App\Address;
use App\Company;
use App\CompanyRole;
use App\ContactDetails;
use App\Events\NewCompanyUserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Job;
use App\Role;
use App\StaffContactDetails;
use App\StaffToApprove;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company)
    {
        $company = Company::where('name', $company)->where('status', 2)->with('roles')->first();
        if(Auth::user() != null){
            return redirect()->route('dashboard.home')->with('toast_error', 'You are already logged into an account');
        }else if($company == null){
            return response()->view('company.notFound')->header("Refresh", "5;url=/");;
        }else{
            return view('company.user.register')->with([
                'company'=> $company,
                'roles' => $company->roles,
            ]);
        }
    }
    public function create(Request $request, $company)
    {
        $validatedData = $request->validate([
            'firstName' => 'required', 'string', 'max:255',
            'lastName' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'employeeNumber' => 'required', 'string', 'email', 'max:255',
            'role' => 'required',
            'line1' => 'required',
            'line2' => 'required',
            'postCode' => 'required',
            'phoneNumber' => 'required|regex:/(0)[0-9]{9}/',
        ]);
        $company = Company::find($company);
        $user = User::create([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'email' => $request['email'],
            'employeeNumber' => $request['employeeNumber'],
            'password' => Hash::make($request['password']),
        ]);
        //Get Roles
        $companyRole = Role::select('id')->where('name', 'companyUser')->first();
        $userRole = Role::select('id')->where('name', 'user')->first();
        //Create User
        $user->roles()->attach($companyRole);
        $user->roles()->attach($userRole);
        $user->company = $company->id;
        $user->employeeNumber = $request->employeeNumber;
        $user->save();
        //Create Address
        $details = new ContactDetails();
        $details->userID = $user->id;
        $details->line1 = $request->line1;
        $details->line2 = $request->line2;
        $details->postCode = $request->postCode;
        $details->phoneNumber = $request->phoneNumber;
        $details->save();
        //Log User In
        Auth::loginUsingId($user->id);
        //Create Jobs
        $role = CompanyRole::find($request->role);
        $job = new Job();
        $job->jobTitle = $role->name;
        $job->company = $company->name;
        $job->payDate = $company->nextPayDate;
        $job->nextPayDate = $company->nextPayDate;
        $job->payFrequency = $company->payFrequency;
        $job->userID = $user->id;
        $job->hourlyPay = $role->payRate;
        $job->sundayPay = calculateSundayPay($request->hourlyPay, $company->sundayPay);
        $job->breakFrequency = $company->breakFrequency;
        $job->save();
        //Send Off Notifications
        $approval = new StaffToApprove();
        $approval->company = $company->id;
        event(new NewCompanyUserRegisterEvent($company, Auth::user()));
        event(new \Illuminate\Auth\Events\Registered($user));
        return redirect('/')->with('toast_success', 'You have successfully registered');
    }

}
