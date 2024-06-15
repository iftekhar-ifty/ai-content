<?php

namespace App\Livewire\Backend;

use App\Models\Payment;
use App\Models\Plan;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        $userCount = User::query()->where('type', 'user')->count();
        $payment = Payment::query()->sum('amount');
        $s = Plan::query()->count();

        return view('livewire.backend.dashboard',[
            'userCount' => $userCount,
            'payment' => $payment,
            's' => $s,
        ])->layout('layouts.app');
    }
}
