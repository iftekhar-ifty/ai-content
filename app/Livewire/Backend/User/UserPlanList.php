<?php

namespace App\Livewire\Backend\User;

use App\Models\Plan;
use Livewire\Component;

class UserPlanList extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        $plans = Plan::query()->take(3)->orderBy('serial')->get();
        return view('livewire.backend.user.user-plan-list',[
            'plans' => $plans
        ])->layout('layouts.app');
    }
}
