<?php

namespace App\Http\Livewire;

use App\ClockRecord;
use Livewire\Component;
use App\User;

class Search extends Component
{
    public $search = '';
    public $shifts = [];

    public function render()
    {
        $this->shifts = ClockRecord::where('shiftDate', 'like', '%' . $this->search . '%')->take(4)->get();
        return view('livewire.search');
    }
}
