<?php

namespace App\Console\Commands;

use App\Company;
use App\Job;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdatePayDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payDates:update';

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
        //Companies
        $companies = Company::all();
        foreach($companies as $company){
            if($company->payFrequency == 1){
                if(Carbon::parse($company->startPayDate)->isToday()){
                    $company->nextPayDate = Carbon::parse()->addWeek(1);
                }
            }else if($company->payFrequency == 2){
                if(Carbon::parse($company->startPayDate)->isToday()){
                    $company->nextPayDate = Carbon::now()->addMonth(1);
                }
            }else if($company->payFrequency == 3){
                if(Carbon::parse($company->startPayDate)->isToday()){
                    $company->nextPayDate = Carbon::now()->addWeeks(4);
                }
            }
            $company->save();
        }
        //Jobs
        $jobs = Job::all();
        foreach($jobs as $job){
            if($job->payFrequency == 1){
                if(Carbon::parse($job->startPayDate)->isToday()){
                    $job->nextPayDate = Carbon::parse($job->startPayDate)->addWeek(1);
                }
            }else if($job->payFrequency == 2){
                if(Carbon::parse($job->startPayDate)->isToday()){
                    $job->nextPayDate = Carbon::parse($job->startPayDate)->addMonth(1);
                }
            }else if($job->payFrequency == 3){
                if(Carbon::parse($job->startPayDate)->isToday()){
                    $job->nextPayDate = Carbon::parse($job->startPayDate)->addWeeks(4);
                }
            }
            $job->save();
        }
    }
}
