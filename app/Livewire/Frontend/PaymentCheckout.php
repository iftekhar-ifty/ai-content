<?php

namespace App\Livewire\Frontend;

use App\Models\Payment;
use App\Models\Plan;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;


class PaymentCheckout extends Component
{
    public $upgradePlan;
    public $name;
    public $email;
    public $cardNumber;
    public $expMonth;
    public $expYear;
    public $cvc;


    public function mount($id)
    {
        $getID = Crypt::decrypt($id);

        $this->upgradePlan = Plan::findOrFail(intval($getID));
        $this->email = auth()->user()->email;
        $this->expMonth = 12;
        $this->expYear = 25;

    }

    public function submitPayment1()
    {

//        dd($this->generateStripeToken());
//        $this->validate([
//            'name' => 'required',
//            'cardNumber' => 'required',
////            'expMonthYear' => 'required|numeric|min:1|max:12',
////            'expYear' => 'required|numeric|min:'.now()->year,
//            'cvc' => 'required|numeric|max:5',
//        ]);


        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a PaymentMethod
            $paymentMethod = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => $this->cardNumber,
                    'exp_month' => $this->expMonth,
                    'exp_year' => $this->expYear,
                    'cvc' => $this->cvc,
                ],
            ]);

            // Create a PaymentIntent
            $paymentIntent = PaymentIntent::create([
                'amount' => 1000, // Amount in cents (e.g., $10.00)
                'currency' => 'usd',
                'payment_method' => $paymentMethod->id,
//                'confirmation_method' => 'manual',
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ],
            ]);





            // Handle successful payment
            if ($paymentIntent->status == 'succeeded') {

                // store payment data
                DB::transaction(function () use ($paymentIntent) {
                    // Create payment record
                    $data = [
                        'user_id' => auth()->id(),
                        'plan_id' => $this->upgradePlan->id,
                        'payment_id' => $paymentIntent['id'],
                        'amount' => $paymentIntent['amount'],
                        'currency' => $paymentIntent['currency'],
                        'status' => $paymentIntent['status'],
                        'confirmation_method' => $paymentIntent['confirmation_method']
                    ];

                    Payment::create($data);

                    // Check if user plan exists
                    $checkExitsPlan = UserPlan::query()->where('user_id', auth()->id())->first();

                    // Update existing plan's cancelled_at field
                    if ($checkExitsPlan) {
                        $checkExitsPlan->update([
                            'cancelled_at' => now()
                        ]);
                    }

                    // Create new user plan
                    $newPlan = UserPlan::create([
                        'plan_id' => $this->upgradePlan->id,
                        'user_id' => auth()->id(),
                        'word_limit' => $this->upgradePlan->word_limit + ($checkExitsPlan ? $checkExitsPlan->word_limit : 0),
                        'subscribed_at' => now(),
                        'expire_date' => Carbon::now()->addMonths($this->upgradePlan->duration),
                    ]);

                });



                return redirect('/')->with('status', 'Payment successful!');
            } else {
                // Handle other statuses
                return back()->with('error', 'Payment failed. Please try again.');
            }
        } catch (ApiErrorException $e) {
            dd($e);
            return back()->with('error', $e->getMessage());
        }
    }
    public function submitPayment()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $checkoutSession = CheckoutSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Sample Product',
                        ],
                        'unit_amount' => 1000, // Amount in cents (e.g., $10.00)
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
            ]);

            return redirect($checkoutSession->url);
        } catch (ApiErrorException $e) {
            return back()->with('error', $e->getMessage());
        }
    }




    public function render()
    {
        return view('livewire.frontend.payment-checkout');
    }
}
