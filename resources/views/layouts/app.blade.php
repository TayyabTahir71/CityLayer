<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
    @livewireStyles
    <link rel='stylesheet' href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="overflow-x-hidden bg-white pattern">

    <main>
        @yield('main')
    </main>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @livewireScripts
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            background-color: transparent;
            outline: 1px solid transparent;
        }
    </style>
</body>

</html>
