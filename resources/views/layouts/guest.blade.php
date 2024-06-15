<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Twixify') }}</title>

    <!-- Fonts -->
    {{--    <link rel="preconnect" href="https://fonts.bunny.net">--}}
    {{--    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .w-full.max-w-sm.p-6.m-auto.mx-auto.rounded-lg.shadow-md {
            border: 1px solid #585858;
        }
        .flex.items-center.bg-indigo-500.justify-center.w-full.px-6.py-2.mx-2.text-sm.font-medium.text-white.transition-colors.duration-300.transform.bg-blue-500.rounded-lg.hover\:bg-blue-400.focus\:bg-blue-400.focus\:outline-none {
            background: #4285f4;
        }
        a.text-white.bg-blue-700.hover\:bg-blue-800.focus\:ring-4.focus\:ring-blue-300.font-medium.rounded-lg.text-sm.px-5.py-2\.5.me-2.mb-2.dark\:bg-blue-600.dark\:hover\:bg-blue-700.focus\:outline-none.dark\:focus\:ring-blue-800 {
            background: #4246c1;
            padding: 10px;
        }
        a.text-white.btn.btn-ghost.text-xl {
            font-weight: 400;
            font-size: 30px;
            font-family: montserrat;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased" style="background: rgb(0 0 0)">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
    {{--            <div>--}}
    {{--                <a href="/" wire:navigate>--}}
    {{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
    {{--                </a>--}}
    {{--            </div>--}}

    <div class="w-full sm:max-w-md mt-6 px-6 py-4  shadow-md overflow-hidden sm:rounded-lg">

        @if(isset($slot ))
            {{ $slot }}

        @else
            @yield('content')
        @endif
    </div>
</div>
</body>
</html>
