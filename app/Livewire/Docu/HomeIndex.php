<?php

namespace App\Livewire\Docu;

use App\Models\User;
use Livewire\Component;

class HomeIndex extends Component
{
    public function render()
    {
        $users = User::count();

        return view('livewire.docu.home-index' , compact('users'));
    }
}
