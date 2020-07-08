<?php

namespace App\Http\Livewire;

use App\Role;
use App\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $userToEdit = null;
    public $idToEdit;
    public $roles;
    public $user;

    public function mount($user, $roles){
        $this->user = $user;
        $this->roles = $roles;
    }

    public function user($userID){
        if($this->userToEdit == null){
            $this->userToEdit = User::find($userID);
        }
    }

    public function render()
    {
        return view('livewire.user-edit');
    }
}
