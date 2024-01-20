<?php

namespace App\Livewire\Docu;

use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{
    public function render()
    {
        $users = User::all();

        return view('livewire.docu.users-index', compact('users'));
    }
}
