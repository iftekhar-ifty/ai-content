@extends('components.layouts.app')
@section('content')


    <div>
        <main>
            <section class="w-full max-w-[600px] mx-auto px-3 sm:px-5 py-12">
                <div class="border-solid border border-slate-700 text-center p-8 rounded-lg shadow-md max-w-sm mx-auto">
                    <img src="https://assets-global.website-files.com/65d878f2f3d32c3b762b0dca/664c416b5e83fd313bb10d67_d9162c9dfc18a35d48193dd5adba01.webp"
                         loading="lazy"
                         width="121"
                         sizes="121px"
                         alt=""
                         srcset="https://assets-global.website-files.com/65d878f2f3d32c3b762b0dca/664c416b5e83fd313bb10d67_d9162c9dfc18a35d48193dd5adba01-p-500.webp 500w, https://assets-global.website-files.com/65d878f2f3d32c3b762b0dca/664c416b5e83fd313bb10d67_d9162c9dfc18a35d48193dd5adba01.webp 640w"
                         class="mx-auto">
                    <h2 class="text-xl text-slate-500 mb-4 mt-3" style="font-size: 20px;">Check Your Email</h2>
                    <p class="text-gray-700 mb-6">We've sent a verification link to your email. Check your spam and promotion folder as well!<span class="font-bold"></span> <a href="{{ route('resend.notice') }}" class="underline">Click to resend</a></p>
                </div>

                {{--                <div class=" border-solid border border-slate-700	 p-8 rounded-lg shadow-md text-center max-w-sm">--}}
                {{--                    <a  href="/" class=" text-xl" style="font-size: 30px;--}}
                {{--            font-weight: 800;">Twixify</a>--}}
                {{--                    <h2 class="text-xl text-slate-500 mb-4 mt-3" style="font-size: 20px;">Check your email</h2>--}}
                {{--                    <p class="text-gray-700 mb-6">We sent a verification link to <span class="font-bold">fucku@gmail.com</span></p>--}}
                {{--                    <a href="mailto:" class="w-full px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">Open email app</a>--}}
                {{--                    <p class="mt-4 text-gray-600">--}}
                {{--                        Didn't receive the email? <a href="{{ route('resend.notice') }}" class="underline">Click to resend</a>--}}
                {{--                    </p>--}}
                {{--                </div>--}}

                {{--                <div role="alert" class="alert shadow-lg">--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
                {{--                    <div>--}}
                {{--                        <h3 class="font-bold">Verify Your Email Address!</h3>--}}
                {{--                        <div class="text-xs">You need to verify your email address to access all features.</div>--}}
                {{--                    </div>--}}
                {{--                   <a href="{{ route('resend.notice') }}" class="btn btn-sm">Resend</a>--}}
                {{--                </div>--}}

            </section>
        </main>
    </div>

@endsection
