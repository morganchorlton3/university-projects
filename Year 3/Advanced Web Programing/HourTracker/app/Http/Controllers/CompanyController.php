<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use Mail;
use App\Mail\CompanyRegisterConfirmation;
use App\Notification;
use App\Notifications\CompanyRequest;
use App\Notifications\ConfirmCompany;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function registerIndex(){
        return view('company.register');
    }

    public function register(Request $request){
        /*$validation = $request->validate([
            'CompanyName' => 'required|unique:company|max:255',
            'employees' => 'required',
            'reason' => 'required|min:100',
        ]);*/

        $company = new Company();
        $company->name = $request->CompanyName;
        $company->ownerUID = Auth::id();
        $company->employees = $request->employees;
        $company->reason = $request->reason;
        $company->save();

        //Notification
        $user = Auth::user();
        $user->notify(new ConfirmCompany($company->id));
        //Notify Admins
        //Send Email
        //Mail::to(Auth::user()->email)->send(new CompanyRegisterConfirmation($company->id));

        return redirect('/')->with('success', 'Your Company request has been sent please wait up to 5 working days for aproval, You have been sent an email with more information');
    }
}
