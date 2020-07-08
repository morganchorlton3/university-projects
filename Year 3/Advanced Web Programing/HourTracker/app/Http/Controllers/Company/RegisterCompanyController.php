<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\ContactDetails;
use App\Events\NewCompanyRequestEvent;
use App\StaffContactDetails;
use Auth;
use Carbon\Carbon;

class RegisterCompanyController extends Controller
{
    public function create()
    {
        /*if(Auth::user()->companyID() == null){
            return back()->with('toast_error', 'You already have a company assigned to your account');
        }*/
        return view('company.register');
    }

    public function store(Request $request)
    {
        //Validation
        $validatedData = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'employees' => 'required',
            'line1' => 'required',
            'line2' => 'required',
            'postCode' => 'required',
            'phoneNumber' => 'required|regex:/(0)[0-9]{9}/',
            'payFrequency' => 'required',
            'date' => 'required',
            'sundayPremium' => 'required',
            'reason' => 'required|min:50',
        ]);

        //Create Company
        $company = new Company();
        $company->name = $request->name;
        $company->employees = $request->employees;
        $company->ownerUID = Auth::id();
        $company->reason = $request->reason;
        $company->breakFrequency = 0;
        $company->sundayPay = $request->sundayPremium;
        $company->payFrequency = $request->payFrequency;
        $company->lastPayDate = Carbon::parse($request->date);
        $company->nextPayDate = Carbon::parse($request->date)->addWeek(4);
        $company->status = 1;
        $company->save();

        //Create Address
        $details = new ContactDetails();
        $details->companyID = $company->id;
        $details->line1 = $request->line1;
        $details->line2 = $request->line2;
        $details->postCode = $request->postCode;
        $details->phoneNumber = $request->phoneNumber;
        $details->save();
        
        //Triger emails to alert admin and registration confrmation
        event(new NewCompanyRequestEvent($company, Auth::user()));

        return redirect('/')->with('success', 'Your Company request has been sent please wait up to 5 working days for aproval, You have been sent an email with more information');
    }
}
