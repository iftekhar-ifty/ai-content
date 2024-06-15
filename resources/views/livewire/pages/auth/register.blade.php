<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));


        $checkPlan = \App\Models\Plan::query()->where('type', 'trial')->first();

//        \App\Models\UserPlan::query()->create([
//            'plan_id' => ,
//            'user_id' => ,
//            'word_limit' => ,
//            'subscribed_at' => ,
//            'expire_date' => ,
//        ]);

        Auth::login($user);
        Auth::user()->sendEmailVerificationNotification();

        $this->redirect('/', navigate: false);
    }
}; ?>

<div>
    <div class="w-full max-w-sm p-6 m-auto mx-auto  rounded-lg shadow-md">
        <div class="flex justify-center mx-auto">
            <a  href="/" class="text-white btn btn-ghost text-xl">Twixify</a>
        </div>

        <form class="mt-6" id="formAuthentication"  wire:submit="register">
            <div class="mb-2">

                <x-input-label class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="name" :value="__('Name')" />
                <x-text-input style="color: rgb(2 6 23)" wire:model="name" id="name" class="block w-full px-4 py-2 mt-2 text-white bg-white border rounded-lg dark:bg-white dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-2">

                <x-input-label class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="name" :value="__('Email')" />
                <x-text-input style="color: rgb(2 6 23)" wire:model="email" id="name" class="block w-full px-4 py-2 mt-2 text-white bg-white border rounded-lg dark:bg-white dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text" name="email" required autofocus autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />


            </div>

            <div class="mb-2">

                <x-input-label class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="password" :value="__('Password')" />
                <x-text-input style="color: rgb(2 6 23)" wire:model="password" id="password" class="block w-full px-4 py-2 mt-2 text-white bg-white border rounded-lg dark:bg-white dark:text-stone-900	 dark:border-gray-800 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="password" name="password" required autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>
            <div class="mb-2">

                <x-input-label class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input style="color: rgb(2 6 23)" wire:model="password_confirmation" id="password_confirmation" class="block w-full px-4 py-2 mt-2 text-white bg-white border rounded-lg dark:bg-white dark:text-stone-900	 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="password" name="password_confirmation" required autofocus autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                   Sign Up To Use Twixify
                </button>
            </div>
        </form>

        <div class="flex items-center justify-between mt-4">
            <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/5"></span>

            <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">
                or login with Google
            </a>

            <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/5"></span>
        </div>

        <div class="flex items-center mt-6 -mx-2">
            <a href="{{ route('auth.google') }}" class="flex items-center bg-indigo-500 justify-center w-full px-6 py-2 mx-2 text-sm font-medium text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:bg-blue-400 focus:outline-none">
                <svg class="w-4 h-4 mx-2 fill-current" viewBox="0 0 24 24">
                    <path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z">
                    </path>
                </svg>

                <span class="hidden mx-2 sm:inline">Sign in with Google</span>
            </a>
        </div>

        <p class="mt-8 text-xs font-light text-center text-gray-400"> Do you have an account? <a href="/login" class="font-medium text-gray-700 dark:text-gray-200 hover:underline">Login</a></p>
        <p class="mt-8 text-xs font-light text-center text-gray-400"> Need help? <a href="https://www.twixify.com/contact" class="font-medium text-gray-700 dark:text-gray-200 hover:underline"><b>Contact support</b></a> for 24/7 assistance </p>
    </div>
    {{--    <form wire:submit="register">--}}
    {{--        <!-- Name -->--}}
    {{--    <div>--}}
    {{--        <x-input-label for="name" :value="__('Name')" />--}}
    {{--        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />--}}
    {{--        <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}

    {{--    </div>--}}

    {{--        <!-- Email Address -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="email" :value="__('Email')" />--}}
    {{--            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />--}}
    {{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password" :value="__('Password')" />--}}

    {{--            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"--}}
    {{--                          type="password"--}}
    {{--                          name="password"--}}
    {{--                          required autocomplete="new-password" />--}}

    {{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <!-- Confirm Password -->--}}
    {{--        <div class="mt-4">--}}
    {{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

    {{--            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"--}}
    {{--                          type="password"--}}
    {{--                          name="password_confirmation" required autocomplete="new-password" />--}}

    {{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
    {{--        </div>--}}

    {{--        <div class="flex items-center justify-end mt-4">--}}
    {{--            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>--}}
    {{--                {{ __('Already registered?') }}--}}
    {{--            </a>--}}

    {{--            <x-primary-button class="ms-4">--}}
    {{--                {{ __('Register') }}--}}
    {{--            </x-primary-button>--}}
    {{--        </div>--}}
    {{--    </form>--}}
</div>
