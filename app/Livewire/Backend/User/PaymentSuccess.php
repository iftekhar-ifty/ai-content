<?php

namespace App\Livewire\Backend\User;

use App\Models\Payment;
use App\Models\Plan;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;
class PaymentSuccess extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.backend.user.payment-success');
    }
}
