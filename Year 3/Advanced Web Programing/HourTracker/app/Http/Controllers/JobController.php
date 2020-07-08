<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job = Job::where('userID', Auth::id())->first();
        if($job != null){
            return back()->with('toast_error', 'You can only have one job assigned to this account');
        }
        return view('job.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $job = new Job;
        $job->jobTitle = $request->jobTitle;
        $job->company = $request->company;
        $job->payDate = Carbon::parse($request->date);
        $job->nextPayDate = Carbon::parse($request->date);
        $job->userID = Auth::id();
        $job->hourlyPay = $request->hourlyPay;
        $job->payFrequency = $request->payFrequency;
        $job->sundayPay = 0;
        $job->breakFrequency = 0;
        $job->breakLength = 0;
        $job->save();
        return redirect('/shift-pattern')->with('success', 'Job Created');
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
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        $job = Job::where('userID', Auth::id())->firstOrFail();

        $job->jobTitle = $request->jobTitle;
        $job->company = $request->company;
        $job->weeklyHours = $request->weeklyHours;
        $job->hourlyPay = $request->hourlyPay;
        $job->save();
    
        return back()->with('success', 'You have updated your account details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
    }
}
