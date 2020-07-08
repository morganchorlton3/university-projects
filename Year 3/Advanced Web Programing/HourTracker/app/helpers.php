<?php

use App\Company;
use Carbon\Carbon;
use App\Job;
use Illuminate\Support\Facades\Auth;
//Formats
function formatDate($date)
{
    return date('d F Y', strtotime($date)); // output 2013-08-14
}
function formatCurency($price){
    return "£" . number_format($price, 2);
}
function daysTillPayDay(){
    if(Auth::user()->company != null){
        $payDay = Carbon::parse(Company::find(Auth::user()->company)->pluck('nextPayDate')->first());
    }else{
        $payDate = Carbon::parse(Job::where('userID', Auth::id())->pluck('nextPayDate'));
    }
    $daysLeft = Carbon::now()->diffInDays($payDay, false);
    // Check if paydate is Today
    return "You have " . $daysLeft . " Days till Payday";
}
function displayGreeting(){
    $time = Carbon::now();
    $user = Auth::user();
    if($time->hour < 12){
        return "Good Morning, " . $user->firstName . ":";
    }else if($time->hour >= 12 && $time->hour < 17){
        return "Good Afternoon, " . $user->firstName . ":";
    }else if($time->hour >= 17){
        return "Good Evening, " . $user->firstName . ":";
    }
}
function calculateShiftLength($start, $end){
    $startTime = Carbon::parse($start);
    $endTime = Carbon::parse($end);

    return $endTime->diffInHours($startTime);

}
function checkShiftLength($shiftLength){
    $job = Job::find(Auth::id());
    $breakFrequency = $job->breakFrequency;
    $breakLengthInHours = $job->breakLength / 60;
    if($shiftLength >= $breakFrequency){
        return $shiftLength - $breakLengthInHours;
    }else{
        return $shiftLength;
    }
}

function calculateSundayPay($shiftPay, $multiply){
    if($multiply == 1){
        return $shiftPay + $shiftPay; 
    }elseif($multiply == 2){
        return $shiftPay + $shiftPay * 0.5; 
    }elseif($multiply == 3){
        return $shiftPay + $shiftPay * 0.25; 
    }
}