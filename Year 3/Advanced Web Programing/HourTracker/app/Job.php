<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProjectedEarnings;

class Job extends Model
{
    protected $table = 'jobs';

    protected $primaryKey = 'userID';

    protected $fillable = [
        'jobTitle', 'company', 'userID', 'hourlyPay', 'sundayPay', 'breakFrequency', 'breakLength'
    ];

    public function projected(){
        return $this->belongsTo('App\ProjectedEarnings', 'userID', 'userID');
    }
}
