<?php

namespace App\Livewire\Backend;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentHistory extends Component
{
    use WithPagination;


    public $user_name;
    public $plan_name;
    public $payment_id;
    public $amount;
    public $currency;
    public $status;
    public $confirmation_method;
    public $perPage = 10;

    public function mount()
    {

    }
    public function render()
    {
        $payments = Payment::query()->latest()->paginate($this->perPage);
        return view('livewire.backend.payment-history',[
            'payments' => $payments
        ])->layout('layouts.app');
    }

    public function edit($value)
    {
        $p = Payment::find($value);

        $this->user_name = $p->user->name ?? '';
        $this->plan_name = $p->plan->name;
        $this->payment_id = $p->payment_id;
        $this->amount = $p->amount;
        $this->currency = $p->currency;
        $this->status = $p->status;
        $this->confirmation_method = $p->confirmation_method;
    }
}
