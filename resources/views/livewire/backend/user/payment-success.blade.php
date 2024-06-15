@extends('layouts.guest')
@section('content')
    <div>
        <div class=" h-screen">
            <div class=" p-6  md:mx-auto">
                <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6 mt-5">
                    <path fill="currentColor"
                          d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-white font-semibold text-center">Payment received! </h3>
                    <p class="text-white my-2">You’re now using Twixify premium!</p>

                    <div class="py-10 text-center" style="line-height: 10">
                        <a href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            GO BACK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
