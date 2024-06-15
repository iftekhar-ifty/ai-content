<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Font - Montserrat -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"
    />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css"
        rel="stylesheet"
        type="text/css"
    />
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

        .forMobileVersion {
            display: none;
        }

        /* Show on mobile */
        @media (max-width: 768px) {
            .forMobileVersion {
                display: block;
            }
            #dsb-container {
                display: none;
            }

        }

        label.inline-flex.items-center.cursor-pointer {
            margin: auto;
        }
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('css')
</head>
<body class="bg-black text-white font-[Montserrat] min-h-screen">
<main>
    @php

        $url = request()->path();

    @endphp
    <section class="flex px-3" x-data="{ isOpen: false }">
        @if($url != 'email-verify')
            <!-- Sidebar toggle -->
            <div
                id="dsb-container"
                class="h-[calc(100vh-100px)] mt-10 mb-5 py-4 flex flex-col justify-between transition-all duration-300 border border-[#1b1b1d] rounded-xl overflow-hidden"
                :class="{ 'dsb-open': isOpen }"
            >
                <div
                    class="w-full flex items-center justify-between pb-6 border-b-2 border-[#eeedf22e]"
                >
                    <p> <img src="https://uploads-ssl.webflow.com/65d878f2f3d32c3b762b0dca/665bd553e373264a363ceea1_Twixify-01.png"></p>
                    <span
                        {{--                        id="dsb-btn" --}}
                        x-on:click="isOpen = !isOpen"
                        class="cursor-pointer text-lg w-[40px] h-[40px] rounded-md hover:bg-[#272727] flex flex-col items-center justify-center"
                    >
              <i class="fa-solid fa-bars"></i>
            </span>
                </div>
                <div class="w-full">
                    <ul class="flex flex-col gap-1">
                        <li>
                            <a
                                href="/"
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
                                href="/user/plan-list"
                                class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                            >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                   <i class="fa-solid fa-chart-simple"></i>
                  </span>
                                <p>Plan</p>
                            </a>
                        </li>

                        <li>
                            <a
                                href="/user/payment-history"
                                class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                            >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                    <i class="fa-solid fa-paper-plane"></i>
                  </span>
                                <p>Payment History</p>
                            </a>
                        </li>

                        <li>
                            <a
                                href="/user-logout"
                                class="flex gap-3 items-center h-10 hover:bg-[#272727] px-2 rounded-lg group"
                            >
                  <span class="text-[#eeedf280] group-hover:text-[#eeedf2]">
                   <i class="fa-solid fa-right-from-bracket"></i>
                  </span>
                                <p>Log Out</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-full flex items-center gap-3">
                    <img
                        class="w-10 h-10 object-cover rounded-md"
                        src="https://ui-avatars.com/api/?name={{ auth()->user()->name ?? '' }}"
                        alt="Photo"
                    />
                    <p>{{ auth()->user()->name ?? '' }}</p>
                </div>
            </div>
            <!-- body -->
        @endif


        <div class="w-full px-3 sm:px-5 py-12">
            @if($url != 'email-verify')
                <div class="text-right">
                    <div class="bg-transparent relative transition-all forMobileVersion">
                        <div id="" class="flex justify-end ">
                            <div
                                id="user_icon_btn"
                                class="bg-white hover:bg-white/90 text-white rounded-full p-0.5 cursor-pointer"
                            >
                                <svg
                                    enable-background="new 0 0 50 50"
                                    height="30px"
                                    id="Layer_1"
                                    version="1.1"
                                    viewBox="0 0 50 50"
                                    width="30px"
                                    xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                    <circle
                        cx="25"
                        cy="25"
                        fill="none"
                        r="24"
                        stroke="#000"
                        stroke-linecap="round"
                        stroke-miterlimit="10"
                        stroke-width="2"
                    />
                                    <rect fill="none" height="50" width="50" />
                                    <path
                                        d="M29.933,35.528c-0.146-1.612-0.09-2.737-0.09-4.21c0.73-0.383,2.038-2.825,2.259-4.888c0.574-0.047,1.479-0.607,1.744-2.818  c0.143-1.187-0.425-1.855-0.771-2.065c0.934-2.809,2.874-11.499-3.588-12.397c-0.665-1.168-2.368-1.759-4.581-1.759  c-8.854,0.163-9.922,6.686-7.981,14.156c-0.345,0.21-0.913,0.878-0.771,2.065c0.266,2.211,1.17,2.771,1.744,2.818  c0.22,2.062,1.58,4.505,2.312,4.888c0,1.473,0.055,2.598-0.091,4.21c-1.261,3.39-7.737,3.655-11.473,6.924  c3.906,3.933,10.236,6.746,16.916,6.746s14.532-5.274,15.839-6.713C37.688,39.186,31.197,38.93,29.933,35.528z"
                                    />
                  </svg>
                            </div>
                        </div>
                        <ul
                            id="user_info_container"
                            class="z-20 menu p-2 shadow shadow-white bg-black rounded-box w-52 mt-2 absolute top-12 right-0 hidden"
                        >
                            <li><a href="/user/plan-list">Plan</a></li>
                            <li><a href="/user/payment-history">Payment History</a></li>
                            <li>
                                <a href="/user-logout">
                                    Logout
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                    >
                                        <path
                                            d="M9 3H5C4.46957 3 3.96086 3.21071 3.58579 3.58579C3.21071 3.96086 3 4.46957 3 5V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H9"
                                            stroke="#E855DE"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                        <path
                                            d="M14 17L9 12L14 7"
                                            stroke="#E855DE"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                        <path
                                            d="M9 12H21"
                                            stroke="#E855DE"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        ></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
            @if(isset($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif

        </div>
    </section>
</main>

<!-- Script JS -->
<script src="{{ asset('content/frontend') }}/JS/script.js"></script>
<!-- Daisy UI JS -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Font awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>

@stack('js')
</body>
</html>
