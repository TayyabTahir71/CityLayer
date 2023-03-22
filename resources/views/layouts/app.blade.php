<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
    @livewireStyles
</head>

<body class="overflow-x-hidden bg-white pattern">

    <main>
        @yield('main')
    </main>
    <footer>
        @include('parts.footer')
    </footer>
    
    @vite('resources/js/app.js')
    @livewireScripts
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
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
