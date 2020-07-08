<?php

namespace App\Http\Controllers\Auth;

use App\ClockRecord;
use App\Company;
use App\Http\Controllers\Controller;
use App\Job;
use App\ShiftPattern;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('admin')){
            return redirect()->route('admin.users.index');
        }elseif($user->hasRole('manager')){
            $company = Company::where('ownerUID', Auth::id())->first();
            $staff = User::where('company', $company->id)->get();
            return view('company.dashboard.index')->with([
                'staff' => $staff
            ]);
        }else{
            $user = User::where('id', Auth::id())->with('job.projected')->first();
            $clocksToDisplay = ClockRecord::where('userID', $user->id)->orderBy('shiftDate', 'desc')->take(5)->get(); 
            $clocks = ClockRecord::where('userID', $user->id)->get();
            $totalEarnings = 0;
            $clockCount= 0;
            $previousMonthEarnings = 0;
            $weeklyPay = 0;
            $currentMonth = 0;
            foreach($clocks as $clock){
                $totalEarnings = $totalEarnings + $clock->shiftPay;
                $clockCount = $clockCount++;
                $date = Carbon::parse($clock->shiftDate); 
                $previousMonth = Carbon::now()->sub(1, 'month');
                if($date->isCurrentWeek()){
                    $weeklyPay = $weeklyPay + $clock->shiftPay;
                }
                if($date->isCurrentMonth()){
                    $currentMonth = $currentMonth + $clock->shiftPay;
                }
                if($date->isAfter($previousMonth)){
                    $previousMonthEarnings = $previousMonthEarnings + $clock->shiftPay;
                }
            }
            return view('auth.dashboard.index')->with([
                'user' => $user,
                'totalEarnings' => $totalEarnings,
                'clockCount' => $clockCount,
                'currentMonth' => $currentMonth,
                'weeklyPay' => $weeklyPay,
                'clocks' => $clocks,
                'clocksToDisplay' => $clocksToDisplay
            ]);
        }
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
}
