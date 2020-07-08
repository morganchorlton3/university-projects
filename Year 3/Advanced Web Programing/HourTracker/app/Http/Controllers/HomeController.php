<?php

namespace App\Http\Controllers;

use App\ClockRecord;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $job = Job::where('userID', Auth::id())->get();
        $clock = ClockRecord::where('userID', Auth::id())->where('active', 1)->first();
        return view('home')->with([
            'job' => $job,
            'clock' => $clock
        ]);
    }

}
