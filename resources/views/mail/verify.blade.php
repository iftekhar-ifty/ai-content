
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">

    <style>
        a.text-white.btn.btn-ghost.text-xl {
            font-size: 30px;
            font-weight: 800;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="font-sans text-gray-900 antialiased" style="background: rgb(0 0 0)">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900
    ">
        <header>
            <a href="#">
                <a  href="/" class="text-white btn btn-ghost text-xl">Twixify</a>
            </a>
        </header>

        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200">Hi!</h2>

            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
            </p>
            <p class="mt-2 mb-3 leading-loose text-gray-600 dark:text-gray-300">
                Please click the button below to verify your email address.
            </p>


            <a href="{{ $url ?? '' }}" class=" mt-5 px-6 py-2 mt-4 text-sm font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Accept the invite
            </a>

            <p class="mt-8 text-gray-600 dark:text-gray-300">
                If you did not create an account, no further action is required. <br> <br>
                Regards,<br>
                Twixify Team
            </p>
        </main>


        <footer class="mt-8">
            <p class="text-gray-500 dark:text-gray-400">
                If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser:
                {{ $url ?? '' }}
            </p>



            <p class="mt-3 text-gray-500 dark:text-gray-400">© 2024 Twixify. All Rights Reserved.</p>
        </footer>
    </section>
</div>
</body>
</html>
