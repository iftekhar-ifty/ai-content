<?php

namespace App\Livewire\Backend\User;

use App\Models\Customer;
use Livewire\Component;

use Stripe\Charge;
use Stripe\Stripe;

class StripePayment extends Component
{
    public $amount;
    public $name;
    public $email;

    protected $rules = [
        'amount' => 'required|numeric|min:1',
        'name' => 'required|string',
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        try {
            Stripe::setApiKey('sk_test_51INz3BAAbBvvJ1CbK05lOv28m1wSehpcOw5OuubX0bZXO1SBnnJU1x19R5cwlwNRmzMzqqOllDPRYSzyokpj3ZYq00ZGenC6Qj');
            $customer = \Stripe\Customer::create();

            $customer = Customer::create([
                'name' => 'sdfsdf',
                'email' => $this->email,
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $this->amount * 100, // Stripe expects the amount in cents
                'currency' => 'usd',
                'source' => request('stripeToken'),
                'description' => 'Payment from ' . $this->email,
                'receipt_email' => $this->email,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            dd($charge);

            session()->flash('success', 'Payment successful!');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.user.stripe-payment')->layout('layouts.user-layout');
    }
}
