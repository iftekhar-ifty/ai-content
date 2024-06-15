<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {


        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }
        $checkPlan = \App\Models\Plan::query()->where('type', 'trial')->first();

        $user = $request->user();
        if ($checkPlan){
            \App\Models\UserPlan::query()->create([
                'plan_id' => $checkPlan->id,
                'user_id' => $user['id'],
                'word_limit' => $checkPlan->word_limit,
                'subscribed_at' => now(),
                'expire_date' => $checkPlan->expire_date,
            ]);

//            $user->update([
//                'ip' => $request->ip()
//            ]);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));


        }




        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
