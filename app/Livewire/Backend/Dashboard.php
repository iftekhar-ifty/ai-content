<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Dashboard extends Component
{
     public function mount()
    {

    }
    public function render()
    {
        return view('livewire.backend.dashboard')->layout('layouts.app');
    }
}
