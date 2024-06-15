<?php

namespace App\Livewire\Backend\User;

use App\Models\Payment;
use Livewire\Component;

class UserPaymentHistory extends Component
{
     public function mount()
    {

    }
    public function render()
    {
        $payments = Payment::query()->where('user_id', auth()->id())->get();
        return view('livewire.backend.user.user-payment-history', compact('payments'));
    }
}
