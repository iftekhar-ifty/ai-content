<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Webhook;

class PaymentController extends Controller
{
    public function success(Request $request)
    {



        Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionId = $request->query('session_id');
        $planId = $request->query('id');
        $planType = $request->query('t');
        $planDurationType = $request->query('d');

        try {
            $session = CheckoutSession::retrieve($sessionId);
            // Retrieve the PaymentIntent ID from the session
            $paymentIntentId = $session->payment_intent;
            $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

            \Log::info('Payment Intent: ', (array) $paymentIntent);




            DB::transaction(function () use ($paymentIntent, $planId, $planDurationType) {


                $plan = Plan::findOrFail($planId);

                // Create payment record
                $data = [
                    'user_id' => auth()->id(),
                    'plan_id' => $plan->id,
                    'payment_id' => $paymentIntent['id'],
                    'amount' => $paymentIntent['amount'],
                    'currency' => $paymentIntent['currency'],
                    'status' => $paymentIntent['status'],
                    'confirmation_method' => $paymentIntent['confirmation_method']
                ];

                Payment::create($data);

                // Check if user plan exists
                $checkExitsPlan = UserPlan::query()->where('user_id', auth()->id())->get();

                $wordExists = 0;

                // Update existing plan's cancelled_at field
                if ($checkExitsPlan) {
                    foreach ($checkExitsPlan as $item) {
                        $wordExists += $item->word_limit;
                        $item->update([
                            'cancelled_at' => now()
                        ]);
                    }

                }
                
                // $planAmount =  $paymentIntent['amount'] / 100;

                $plan->word_limit = (int) $plan->word_limit;
                $wordExistsInt = (int) $wordExists;
                $totalWords = $plan->word_limit + $wordExistsInt;

                // Create new user plan
                $newPlan = UserPlan::create([
                    'plan_id' => $plan->id,
                    'user_id' => auth()->id(),
                    'word_limit' => $totalWords,
                    'subscribed_at' => now(),
                    'expire_date' => $planDurationType == 'm' ? Carbon::now()->addMonth() : Carbon::now()->addYear(),
                ]);

            });

            return view('livewire.backend.user.payment-success');
            
        } catch (ApiErrorException $e) {

            return back()->with('error', $e->getMessage());
        }

    }
}
