<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
    @livewireStyles
</head>

<body class="overflow-x-hidden bg-gray-900 pattern" data-barba="wrapper">
    
    <main>
        @yield('main')
    </main>
    <footer>
        @include('parts.footer')
    </footer>
    
    @vite('resources/js/app.js')
    @livewireScripts
    <script src="./node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
