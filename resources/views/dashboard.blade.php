@extends('layouts.app')

@section('main')
    <div data-barba="container">
             @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
     
            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
               <div class="flex flex-row justify-between">
                <h4 class="pt-4 mt-2 font-semibold text-gray-900 select-none">Start New Mapping:</h4>
                 <h4 class="pt-4 mt-2 font-semibold text-gray-900 select-none">Points: 25</h4>
                </div>
                <div class="flex items-center justify-between space-x-3 overflow-y-scroll">
                    <a href="street" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-green-200 shadow cursor-pointer hover:bg-green-300 active:bg-green-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-road"></i>
                            <p class="mt-1 text-xs select-none">Street</p>
                        </div>
                    </a>
                    <a href="building" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-yellow-200 shadow cursor-pointer hover:bg-yellow-300 active:bg-yellow-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-building"></i>
                            <p class="mt-1 text-xs select-none">Building</p>
                        </div>
                    </a>
                    <a href="openspace" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-indigo-200 shadow cursor-pointer hover:bg-indigo-300 active:bg-indigo-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-street-view"></i>
                            <p class="mt-1 text-xs select-none">Open space</p>
                        </div>
                    </a>
                </div>

                <h4 class="font-semibold text-gray-900 select-none">Your data:</h4>
                <div class="grid grid-cols-1">
                    <div class="">
                        <div class="flex p-2 mb-2 bg-white border rounded shadow-md">
                            <img src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                                alt="Just a flower" class="object-cover w-16 h-16 rounded">
                            <div class="flex flex-col justify-center w-full px-2 py-1">
                                <div class="flex items-center justify-between ">
                                    <div class="flex flex-col">
                                        <h2 class="text-sm font-medium text-gray-800 select-none">Dynamic street</h2>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-gray-500 cursor-pointer hover:text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </div>
                                <div class="flex pt-2 text-sm text-gray-400">
                                    <div class="flex items-center mr-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-yellow-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <p class="font-normal"></p>
                                    </div>
                                    <div class="flex items-center font-medium text-gray-900 select-none">
                                        Paris
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex p-2 mb-2 bg-white border rounded shadow-md">
                            <img src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                                alt="Just a flower" class="object-cover w-16 h-16 rounded">
                            <div class="flex flex-col justify-center w-full px-2 py-1">
                            
                                <div class="flex items-center justify-between ">
                                    <div class="flex flex-col">
                                        <h2 class="text-sm font-medium text-gray-800 select-none">Test building</h2>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-gray-500 cursor-pointer hover:text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </div>
                                
                                <div class="flex pt-2 text-sm text-gray-400">
                                    <div class="flex items-center mr-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-yellow-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <p class="font-normal"></p>
                                    </div>
                                    <div class="flex items-center font-medium text-gray-900 select-none">
                                        Paris
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            markers = {};

            let mymap0 = L.map('map').setView([38.6890, 11.14086], 2);
            osmLayer0 = L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    apikey: 'choisirgeoportail',
                    format: 'image/jpeg',
                    style: 'normal'
                }).addTo(mymap0);
            mymap0.addLayer(osmLayer0);
            mymap0.touchZoom.enable();
            mymap0.scrollWheelZoom.disable();
                     icon = L.icon({
                iconUrl: '/img/marker.png',
                iconSize: [20, 20],
                iconAnchor: [20, 20],
                popupAnchor: [0, -20]
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    mymap0.setView([position.coords.latitude, position.coords.longitude], 17);
                    L.marker([position.coords.latitude, position.coords.longitude], { icon: icon }).addTo(mymap0);
                });
            } else {
             mymap.on('click', function(e) {
                 if (marker) {
                     mymap.removeLayer(marker);
                 }
                 marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
             });
         }
        </script>
    @endsection
