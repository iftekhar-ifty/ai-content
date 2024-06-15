<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id'=> $user->id,
                    'password' => encrypt('password')
                ]);


                $checkPlan = \App\Models\Plan::query()->where('type', 'trial')->first();

                \App\Models\UserPlan::query()->create([
                    'plan_id' => $checkPlan->id,
                        'user_id' => $newUser->id,
                        'word_limit' => $checkPlan->word_limit,
                        'subscribed_at' => now(),
                        'expire_date' => Carbon::now()->addMonths($checkPlan->duration),
                    ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e);
        }
    }
}
