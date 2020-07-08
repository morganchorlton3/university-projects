<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use App\Mail\Company\AproveCompanyRequest;
use App\Mail\Company\DenyCompanyRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Mail;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::where('status', 2)->paginate(8);
        $requests =  Company::where('status', 1)->paginate(8);
        return view('admin.company.index')->with([
            'companies' => $companies,
            'requests' => $requests
        ]);
    }

    public function approve($id){
        $company = Company::find($id)->with('owner')->first();
        $company->status = 2;
        $company->save();
        $user = User::find($company->ownerUID);
        if($user->hasRole('manager') == false){
            $role = Role::select('id')->where('name', 'manager')->first();
            $user->roles()->attach($role);
        }
        Mail::to($company->owner->email)
            ->queue(new AproveCompanyRequest());
        return redirect()->back()->with('toast_success', 'Company Request Approved');
    }

    public function deny($id){
        $company = Company::with('owner')->find($id);
        $company->status = 3;
        $company->save();
        Mail::to($company->owner->email)
            ->queue(new DenyCompanyRequest());
        return back()->with('toast_success', 'Company Request Denied');
    }
}
