<?php

namespace App\Console\Commands;

use App\ClockRecord;
use App\Company;
use App\paySlip;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreatePaySlips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payslips:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //get all Companies that have a paydate in 1 week
        $dateToCheck = Carbon::today()->addWeek(1);
        $companies = Company::where('nextPayDate', $dateToCheck)->with('staff')->get();
        foreach($companies as $company){
            foreach($company->staff->where('companyStatus', 1) as $staff){
                $clocks = ClockRecord::where('shiftDate','>=', Carbon::parse($company->lastPayDate)->format('Y-m-d'))
                    ->where('shiftDate','<=', $dateToCheck->format('Y-m-d'))
                    ->get();
                dump("Start Date: " . Carbon::parse($company->lastPayDate)->format('Y-m-d'));
                dump("End Date: " . $dateToCheck->format('Y-m-d'));
                $totalPay = 0;
                $hoursWorked = 0;
                foreach($clocks as $clock){
                    $totalPay = $totalPay + $clock->shiftPay;
                    $hoursWorked = $hoursWorked + $clock->hoursWorked;
                }
                $paySlip = new paySlip();
                $paySlip->userID = $staff->id;
                $paySlip->date = $company->nextPayDate;
                $paySlip->totalPay = $totalPay;
                $paySlip->taxDeductions = $totalPay * 0.1; //10 for now 
                $paySlip->netPay = $paySlip->totalPay - $paySlip->taxDeductions;
                $paySlip->hoursWorked = $hoursWorked;
                $paySlip->save();
            }
        }
    }
}
