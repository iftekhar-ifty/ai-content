


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css"
        rel="stylesheet"
        type="text/css"
    />

    @livewireStyles
    <!-- Font awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />

    <title>App</title>

    <style>
        input[type="range"] {
            width: 100%;
            height: 6px;
            background: linear-gradient(
                to right,
                #d5bafe 0%,
                #d5bafe var(--range-value),
                #fff var(--range-value),
                #fff 100%
            );
            border-radius: 10px;
            outline: none;
        }
        input[type="range"]::-webkit-slider-runnable-track {
            background-color: transparent;
            border-radius: 3px;
            height: 6px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background-color: #d5bafe;
            border-radius: 50%;
            margin-top: -7px;
            cursor: grab;
        }

        input[type="range"]:active::-webkit-slider-thumb {
            outline: 2px solid #9b9b9b;
            outline-offset: 5px;
            background-color: #1378d1;
        }
        /* Sidebar toggle */
        #dsb-container {
            width: 70px;
            align-items: center;
            transition: 0.5s;
            padding-left: 15px;
            padding-right: 15px;
        }
        #dsb-container.dsb-open {
            width: 300px !important;
            align-items: flex-start;
            transition: 0.5s;
        }
        #dsb-container p {
            width: 0;
            visibility: hidden;
            transition: 0.1s;
        }
        #dsb-container.dsb-open p {
            width: auto;
            visibility: visible;
            transition: 0.8s;
        }
    </style>
    <script src="JS/script.js"></script>
</head>
<body class="bg-black text-white font-[Montserrat] min-h-screen">
<main>
    <section class="flex px-3">
        <!-- Sidebar toggle -->
        <div
            id="dsb-container"
            class="h-[calc(100vh-100px)] mt-10 mb-5 py-4 flex flex-col justify-between transition-all duration-300 border border-[#1b1b1d] rounded-xl overflow-hidden"
        >
            <div
                class="w-full flex items-center justify-between pb-6 border-b-2 border-[#eeedf22e]"
            >
                <p>Dashboard</p>
                <span
                    id="dsb-btn"
                    class="cursor-pointer text-lg w-[40px] h-[40px] rounded-md hover:bg-[#272727] flex flex-col items-center justify-center"
                >
              <i class="fa-solid fa-bars"></i>
            </span>
            </div>
            <div class="w-full">
                <ul class="flex flex-col gap-1">
                    <li>
                        <a
                            href="#"
                            class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                        >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                    <i class="fa-solid fa-house"></i>
                  </span>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                        >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                    <i class="fa-solid fa-paper-plane"></i>
                  </span>
                            <p>Support</p>
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                        >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                    <i class="fa-solid fa-users"></i>
                  </span>
                            <p>Community</p>
                        </a>
                    </li>
                    <li>
                        <a
                            href="#"
                            class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                        >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                    <i class="fa-solid fa-gear"></i>
                  </span>
                            <p>Plan Info</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full flex items-center gap-3">
                <img
                    class="w-10 h-10 object-cover rounded-md"
                    src="https://assets-global.website-files.com/65d878f2f3d32c3b762b0dca/664c3a00d54fc8e2c201c025_profile.jpg"
                    alt="Photo"
                />
                <p>Hey David</p>
            </div>
        </div>
        <!-- body -->
        @if(isset($slot))
            {{ $slot }}
        @else
            @yield('content')
        @endif
    </section>
</main>

<!-- Script JS -->
<script src="{{ asset('content/frontend') }}/JS/script.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
@livewireScripts
</body>
</html>
