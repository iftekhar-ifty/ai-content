<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: RouteServiceProvider::HOME, navigate: false);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-full max-w-sm p-6 m-auto mx-auto  rounded-lg shadow-md">
        <div class="flex justify-center mx-auto">
           <a  href="/" class="text-white btn btn-ghost text-xl">Twixify</a>
        </div>

        <form class="mt-6" id="formAuthentication"  wire:submit="login">
            <div>

                <x-input-label class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="email" :value="__('Email')" />
                <x-text-input style="color: rgb(2 6 23)" wire:model="form.email" id="email" class="block w-full px-4 py-2 mt-2 text-white bg-white border rounded-lg dark:bg-white dark:bg-white dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="email" name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />


            </div>

            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <x-input-label  class="block  text-xs text-gray-600 dark:text-gray-400 hover:underline" for="password" :value="__('Password')" />

                    <a href="/forgot-password" class="text-xs text-gray-600 dark:text-gray-400 hover:underline">Reset Password ?</a>
                </div>

                <x-text-input style="color: rgb(2 6 23)" wire:model="form.password" id="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-lg dark:bg-white dark:bg-white dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>

                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                    Twixify - Sign In
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

        <p class="mt-8 text-xs font-light text-center text-gray-400"> Don't have an account? <a href="/register" class="font-medium text-gray-700 dark:text-gray-200 hover:underline">Create One</a></p>
                <p class="mt-8 text-xs font-light text-center text-gray-400"> Need help? <a href="https://www.twixify.com/contact" class="font-medium text-gray-700 dark:text-gray-200 hover:underline"><b>Contact support</b></a> for 24/7 assistance </p>

    </div>
</div>


