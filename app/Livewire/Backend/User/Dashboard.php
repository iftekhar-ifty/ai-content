<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.backend.user.dashboard')->layout('layouts.app');
    }
}
