<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
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
    </style>
</head>
<body class="bg-black text-white font-[Montserrat] min-h-screen">

{{ $slot }}

<!-- Daisy UI JS -->
<script src="{{ asset('content/frontend') }}/JS/script.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
