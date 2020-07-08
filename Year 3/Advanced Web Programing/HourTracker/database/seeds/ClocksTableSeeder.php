<?php

use App\ClockRecord;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $day = Carbon::now()->startOfWeek();
        for ($i=0; $i < 4; $i++) { 
            ClockRecord::create([
                'userID' => '53',
                'in' => '18:00',
                'out' => '22:00',
                'active' => 0,
                'hoursWorked' => 4,
                'shiftPay' => 38.72,
                'shiftDate' => $day,
                'shiftType' => 1,
            ]);
            $day->addDays(3);
            ClockRecord::create([
                'userID' => '53',
                'in' => '18:00',
                'out' => '22:00',
                'active' => 0,
                'hoursWorked' => 4,
                'shiftPay' => 38.72,
                'shiftDate' => $day,
                'shiftType' => 1,
            ]);
            $day->addDays(1);
            ClockRecord::create([
                'userID' => '53',
                'in' => '19:00',
                'out' => '23:00',
                'active' => 0,
                'hoursWorked' => 4,
                'shiftPay' => 38.72,
                'shiftDate' => $day,
                'shiftType' => 1,
            ]);
            $day->addDays(2);
            ClockRecord::create([
                'userID' => '53',
                'in' => '09:00',
                'out' => '15:00',
                'active' => 0,
                'hoursWorked' => 5.5,
                'shiftPay' => 53.24,
                'shiftDate' => $day,
                'shiftType' => 2,
            ]);
            $day->addDay(1);
        }
    }
}
