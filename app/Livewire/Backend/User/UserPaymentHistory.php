<?php

namespace App\Livewire\Backend\User;

use Livewire\Component;

class UserPaymentHistory extends Component
{
     public function mount()
    {

    }
    public function render()
    {
        return view('livewire.backend.user.user-payment-history')->layout('layouts.app');
    }
}
