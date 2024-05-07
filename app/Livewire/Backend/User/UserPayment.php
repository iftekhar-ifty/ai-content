<?php

namespace App\Livewire\Backend\User;

use App\Models\Plan;
use Exception;
use Livewire\Component;
use Stripe\Exception\InvalidRequestException;
use Stripe;


class UserPayment extends Component
{
    public $plan;


    public $amount;
    public $cardDetails = []; // Empty array to store card details
    public $paymentIntentClientSecret;
    public $paymentSuccessful = false;
    public $errorMessage = '';


    public function mount($id)
    {



        $this->plan = Plan::find(intval($id));
//        $this->stripe = new Stripe('pk_test_51INz3BAAbBvvJ1CbMgJFM1Jr3o9L98hWTLi92GMdiMWmVebXaYXtJHkMIHKcwqGPKBlb42R9dCIRsF8jB9oKdq5a00KNiFfyCq');

    }

    public function submitPayment()
    {
        $this->validate([
//            'amount' => 'required|numeric|min:0.01', // Ensure valid amount
            'cardDetails.card' => 'required', // Validate card details
        ]);

        try {
            $data =  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
           $p =  Stripe\Charge::create ([
                "amount" => 10 * 100,
                "currency" => "usd",
                "source" => 3434,
                "description" => "Test payment from itsolutionstuff.com."
            ]);
           dd($p);

            // Create a PaymentIntent on Stripe
            $paymentIntent = $this->stripe->paymentIntents->create([
                'amount' => $this->amount * 100, // Convert to cents
                'currency' => 'usd', // Replace with your currency
                // Optionally, specify metadata for the payment
                'metadata' => [
                    'user_id' => auth()->id(), // Example user ID
                ],
            ]);

            $this->paymentIntentClientSecret = $paymentIntent->client_secret;
        } catch (InvalidRequestException $e) {
            dd($e->getMessage());
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.user.user-payment')->layout('layouts.app');
    }
}
