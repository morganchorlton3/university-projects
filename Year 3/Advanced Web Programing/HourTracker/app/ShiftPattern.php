<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftPattern extends Model
{
    protected $table = 'shift_pattern';

    protected $primaryKey = 'userID';

    protected $fillable = [
        'userID', 'mondayCI', 'mondayCO', 'mondaySL',  'tuesdayCI', 'tuesdayCO', 'tuesdaySL','wednesdayCI', 
        'wednesdayCO', 'wednesdaySL', 'thursdayCI', 'thursdayCO', 'thursdaySL', 'fridayCI', 'fridayCO', 'fridaySL',
         'saturdayCI', 'saturdayCO', 'saturdaySL', 'sundayCI', 'sundayCO', 'sundaySL', 'weeklyHours'
    ];
}
