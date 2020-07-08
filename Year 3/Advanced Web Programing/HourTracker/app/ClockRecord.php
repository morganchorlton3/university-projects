<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClockRecord extends Model
{
    protected $table = 'clocks';
    protected $fillable = [
        'userID', 'clockIn', 'clockOut', 'hoursWorked', 'shiftPay', 'shiftDate'
    ];
}
