<?php

use App\Job;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'jobTitle' => 'Owner',
            'company' => 'HourTracker',
            'hourlyPay' => 12.00,
            'sundayPay' => 14.00,
            'breakFrequency' => 4,
            'breakLength' => 0.30,
            'payDate' => Carbon::now(),
            'nextPayDate' => Carbon::now(),
            'payFrequency' => 3,
            'userID' => 1
        ]);
    }
}
