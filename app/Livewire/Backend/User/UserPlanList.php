<?php

namespace App\Livewire\Backend\User;

use App\Models\Plan;
use App\Models\User;
use App\Models\UserPlan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class UserPlanList extends Component
{

    public $planTypeMonth = true;
    public $planType;


    public function planTypeGet($value)
    {

    }
    public function render()
    {
        $plans = Plan::query()->where('status', 0)->orderBy('serial')->get();
        return view('livewire.backend.user.user-plan-list',[
            'plans' => $plans
        ])->layout('components.layouts.app');
    }

    public function updatedPlanType($value)
    {
        if($value == true){
            $this->planTypeMonth = false;
        }else{
            $this->planTypeMonth = true;
        }
    }

    public function getAPlan($id)
    {
        $getPlan = intval($id);

        $plan = Plan::find($getPlan);
        try {

            $date = Carbon::now();

            if($plan->type == 'trial'){


                $userPlan =  UserPlan::create([
                    'plan_id' => $plan->id,
                    'user_id' => auth()->id(),
                    'subscribed_at' => $date,
                    'expire_date' => $date->addDays($plan->duration),
                    'is_active' => 1,
                ]);

                UserPlan::query()->where('id', '!=', $userPlan->id)
                    ->where('user_id', auth()->id())
                    ->update(['is_active' => 0]);


                session()->flash('status', 'Your trial subscription has started.');
            }else{
                $planData = [
                    'plan_id' => $plan->id,
                    'duration' => $plan->duration,
                    'price' => $plan->price,
                    'type' => $plan->type,
                ];

                $sessionData = session()->put('planDataStore', $planData);

            }

        }catch (\Exception $e){
            dd($e);
        }

    }


    public function submit()
    {
//        $this->validate();

        try {
            Stripe::setApiKey(config('sk_test_51INz3BAAbBvvJ1CbK05lOv28m1wSehpcOw5OuubX0bZXO1SBnnJU1x19R5cwlwNRmzMzqqOllDPRYSzyokpj3ZYq00ZGenC6Qj'));
//            Stripe::setApiKey(config('services.stripe.secret'));

            $charge = Charge::create([
                'amount' => 20 * 100, // Stripe expects the amount in cents
                'currency' => 'usd',
                'source' => request('stripeToken'),
                'description' => 'Payment from ' . 'my@email.com',
                'receipt_email' => 'my@email.com',
            ]);

            dd($charge);

            session()->flash('success', 'Payment successful!');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function upgradePlan($id)
    {


        $id = intval($id);
        try {
            $plan = Plan::findOrFail($id);

            $checkExitsPlan = UserPlan::query()->where('user_id', auth()->id())->first();

            $checkExitsPlan->update([
                'cancelled_at' =>  now()
            ]);

            $newPlan = UserPlan::create([
                'plan_id' => $plan->id,
                'user_id' => auth()->id(),
                'word_limit' => $plan->word_limit + $checkExitsPlan->word_limit,
                'subscribed_at' => now(),
                'expire_date' => Carbon::now()->addMonths($plan->duration),
            ]);

        }catch (\Exception $exception){
            dd($exception);
        }

        session()->flash('status', 'Plan upgrade successfully done');

    }

    public function goTOCheckout($id)
    {

        $getID = intval($id);

        $plan= Plan::findOrFail(intval($getID));
        
        
        $get_STRIPE_SECRET = \App\Models\Setting::find(1);
        
        // $sKy =  env('STRIPE_SECRET');
        
         $sKy = $get_STRIPE_SECRET->stripe_s ??  env('STRIPE_SECRET');

        Stripe::setApiKey($sKy);

        // if($this->planTypeMonth){
        //     dd($plan->price);
        // }else{
        //     dd($plan->y_price * 12);
        // }

        try {
            $checkoutSession = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $this->planTypeMonth ? $plan->price * 100 : ($plan->y_price * 12) * 100 , // Amount in cents (e.g., $10.00)
                    ],
                    'quantity' => 1,
                ]],
                'metadata' => [
                    'description' => 'Payment for subscription plan',
                    'invoice' => 'in_12345', // Custom metadata field for the invoice ID
                ],
                'mode' => 'payment',
                'success_url' =>route('success') . '?session_id={CHECKOUT_SESSION_ID}&id=' . $plan->id . '&d=' . ($this->planTypeMonth ? 'm' : 'y'),
                'cancel_url' => route('cancel'),
            ]);



            return redirect($checkoutSession->url);
        } catch (ApiErrorException $e) {

            dd($e);
            return back()->with('error', $e->getMessage());
        }
    }

}
