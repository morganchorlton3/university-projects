<?php

nameSPace App\Http\Controllers;

use App\ClockRecord;
use Illuminate\Http\Request;
use App\ShiftPattern;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ProjectedEarnings;
use App\Job;

class ShiftPatternController extends Controller
{
    /**
     * DiSPlay a listing of the resource.
     *
     * @return \Illuminate\Http\ReSPonse
     */
    public function index()
    {
        $shifts = ShiftPattern::where('userID', Auth::id())->first();
        return view('auth.dashboard.shiftPattern')->with('shifts', $shifts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\ReSPonse
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\ReSPonse
     */
    public function store(Request $request)
    {
        $SP = new ShiftPattern;
        $SP->userID = $request->id;
        $pay = Job::where('userID', $request->id)->first()->hourlyPay;
        $hourCounter = 0;
        $SP->date = Carbon::parse($request->date); 
        if($request->mondayCI != null){
            $start = Carbon::parse($request->mondayCI);
            $end = Carbon::parse($request->mondayCO);
            $SP->mondayCI = $start;
            $SP->mondayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->tuesdayCI != null){
            $start = Carbon::parse($request->tuesdayCI);
            $end = Carbon::parse($request->tuesdayCO);
            $SP->tuesdayCI = $start;
            $SP->tuesdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->wednesdayyCI != null){
            $start = Carbon::parse($request->wednesdayCI);
            $end = Carbon::parse($request->wednesdayCO);
            $SP->wednesdayCI = $start;
            $SP->wednesdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->thursdayCI != null){
            $start = Carbon::parse($request->thursdayCI);
            $end = Carbon::parse($request->thursdayCO);
            $SP->thursdayCI = $start;
            $SP->thursdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->fridayCI != null){
            $start = Carbon::parse($request->fridayCI);
            $end = Carbon::parse($request->fridayCO);
            $SP->fridayCI = $start;
            $SP->fridayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->saturdayCI != null){
            $start = Carbon::parse($request->saturday);
            $end = Carbon::parse($request->saturday);
            $SP->saturdayCI = $start;
            $SP->saturdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->sundayCI != null){
            $start = Carbon::parse($request->sundayCI);
            $end = Carbon::parse($request->sundayCO);
            $SP->sundayCI = $start;
            $SP->sundayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        $SP->save();
        $projected = new ProjectedEarnings();
        $projected->userID = Auth::id();
        $projected->weeklyPay = $hourCounter * $pay;
        $projected->monthlyPay = $hourCounter * $pay * 4;
        $projected->yearlyPay = $hourCounter * $pay * 52;
        $projected->save();
        return back()->with('success', 'Shift pattern saved!');
    }

    /**
     * DiSPlay the SPecified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ReSPonse
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the SPecified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ReSPonse
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the SPecified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\ReSPonse
     */
    public function update(Request $request)
    {
        $hourCounter = 0;
        $pay = Job::where('userID', Auth::id())->first()->hourlyPay;
        $SP = ShiftPattern::where('userID', Auth::id())->first();
        if($request->mondayCI != null){
            $start = Carbon::parse($request->mondayCI);
            $end = Carbon::parse($request->mondayCO);
            $SP->mondayCI = $start;
            $SP->mondayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->tuesdayCI != null){
            $start = Carbon::parse($request->tuesdayCI);
            $end = Carbon::parse($request->tuesdayCO);
            $SP->tuesdayCI = $start;
            $SP->tuesdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->wednesdayyCI != null){
            $start = Carbon::parse($request->wednesdayCI);
            $end = Carbon::parse($request->wednesdayCO);
            $SP->wednesdayCI = $start;
            $SP->wednesdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->thursdayCI != null){
            $start = Carbon::parse($request->thursdayCI);
            $end = Carbon::parse($request->thursdayCO);
            $SP->thursdayCI = $start;
            $SP->thursdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->fridayCI != null){
            $start = Carbon::parse($request->fridayCI);
            $end = Carbon::parse($request->fridayCO);
            $SP->fridayCI = $start;
            $SP->fridayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->saturdayCI != null){
            $start = Carbon::parse($request->saturday);
            $end = Carbon::parse($request->saturday);
            $SP->saturdayCI = $start;
            $SP->saturdayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        if($request->sundayCI != null){
            $start = Carbon::parse($request->sundayCI);
            $end = Carbon::parse($request->sundayCO);
            $SP->sundayCI = $start;
            $SP->sundayCO = $end;
            $hourCounter = $hourCounter + ($end->diffInMinutes($start) / 60 );
        }
        $SP->save();
        $projected = ProjectedEarnings::where('userID', Auth::id())->first();
        $projected->userID = Auth::id();
        $projected->weeklyPay = $hourCounter * $pay;
        $projected->monthlyPay = $hourCounter * $pay * 4;
        $projected->yearlyPay = $hourCounter * $pay * 52;
        $projected->save();
        return back()->with('toast_success', 'Shift pattern updated!');
    }

    /**
     * Remove the SPecified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ReSPonse
     */
    public function destroy($id)
    {
        //
    }
}
