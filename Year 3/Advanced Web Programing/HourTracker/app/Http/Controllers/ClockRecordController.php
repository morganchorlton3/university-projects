<?php

namespace App\Http\Controllers;

use App\ClockRecord;
use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClockRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clocks = ClockRecord::where('userID', Auth::id())->get();
        return view('auth.dashboard.clocks.index')->with([
            'clocks' => $clocks
            ]);
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
     * @param  \App\ClockRecord  $ClockRecord
     * @return \Illuminate\Http\Response
     */
    public function show(ClockRecord $ClockRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClockRecord  $ClockRecord
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clockRecord = ClockRecord::find($id);
        return view('dashboard.clocks.edit')->with('clock', $clockRecord);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClockRecord  $ClockRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClockRecord $ClockRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClockRecord  $ClockRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ClockRecord = clockRecord::find($id);
        $ClockRecord->delete();
        return redirect()->route('clocks', ['success' => 'Clock record removed!']);
    }

    public function clockIn(){ 
        $currentTime = Carbon::now();
        $clockRecord = new ClockRecord();
        $clockRecord->userID = Auth::id();
        $clockRecord->in = $currentTime;
        $clockRecord->shiftPay = 0;
        $clockRecord->hoursWorked = 0;
        $clockRecord->shiftDate = Carbon::now()->format('Y-m-d');
        $clockRecord->active = 1;
        $clockRecord->save();
        return back()->with('success', 'You have clocked in!');
        
    }

    public function clockOut(){
        $currentTime = Carbon::now();
        $matchThese = ['active' => 1, 'userID' => Auth::id()];
        $clockRecord = ClockRecord::where($matchThese)->firstOrFail();
        
        $shiftLength = $currentTime->diffInHours($clockRecord->clockIn);

        $clockRecord->update([
            $clockRecord->out = $currentTime,
            $clockRecord->active = 0,
            $clockRecord->hoursWorked = $shiftLength,
            $clockRecord->shiftPay = $shiftLength * 9.68,
        ]);
        $clockRecord->save();
        return back()->with('success', 'You have clocked out!');
        //dd($clockRecord);
        
    }

    public function clockRecord(Request $request){ 
        $clockRecord = new ClockRecord();
        $clockRecord->userID = Auth::id();
        $clockRecord->clockIn = Carbon::parse($request->clockIn)->format('H:i');
        $clockRecord->clockOut = Carbon::parse($request->clockOut)->format('H:i');
        $shiftLength = Carbon::parse($request->clockOut)->diffInHours(Carbon::parse($request->clockIn));
        $clockRecord->hoursWorked = checkShiftLength($shiftLength);
        $clockRecord->shiftPay = checkShiftLength($shiftLength) * 9.68;
        $clockRecord->shiftDate = Carbon::parse($request->date);
        $clockRecord->active = 0;
        
        $clockRecord->save();
        return back()->with('success', 'You have clocked in!');
        
    }

    public function searchByDate(Request $request){
        $query = Carbon::parse($request->date)->format('Y-m-d');
        $clockRecord = ClockRecord::where('shiftDate', $query)->firstOrFail();
        return view('Hours.Edit')->with('clock', $clockRecord);
    }

    public function searchByHour(Request $request){
        $clockRecord = ClockRecord::where('hoursWorked', $request->hoursWorked)->paginate(6);
        return view('Hours.Search')->with('clocks', $clockRecord);
    }
}
