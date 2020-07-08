<?php

namespace App\Http\Livewire;

use App\Role;
use App\ShiftPattern;
use App\User;
use Carbon\Carbon;
use Livewire\Component;

class AddShifts extends Component
{
    public $staffToAdd = null;
    public $idToEdit;
    public $shifts = null;
    public $staff;
    public $dateString;

    public function mount($staff){
        $this->staff = $staff;
        $this->dateString = Carbon::now()->startOfWeek()->format('l jS M');
    }

    public function staff($userID){
        if($this->staffToAdd == null){
            $this->staffToAdd = User::find($userID);
        }
    }

    public function render()
    {
        $this->shifts = ShiftPattern::where('userID', '54')->where('date', Carbon::parse($this->dateString))->first();
        return view('livewire.add-shifts');
    }

    public function addWeek(){
        $this->dateString = Carbon::parse($this->dateString)->addWeek(1)->format('l jS M');
    }
    public function subWeek(){
        $this->dateString = Carbon::parse($this->dateString)->subWeek(1)->format('l jS M');
    }

}
