@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col h-screen mx-auto bg-gray-900">
                <nav class="fixed top-0 z-20 w-full px-2 pt-4 mx-2 bg-gray-900 md:pt-8">
                    <div class="flex flex-wrap items-center justify-between pb-4 pr-4 mx-auto border-b border-gray-700 lg:mx-16">
                        <a href="#" class="flex items-center">
                           <i class="mr-3 fa-regular fa-map"></i>
                            <span class="self-center text-xl font-semibold text-white whitespace-nowrap">City Layer</span>
                        </a>
                        <button data-collapse-toggle="navbar-multi-level" type="button"
                            class="inline-flex items-center p-2 ml-3 text-sm text-gray-400 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600"
                            aria-controls="navbar-multi-level" aria-expanded="false">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div class="relative hidden w-full" id="navbar-multi-level">
                            <ul
                                class="flex flex-col p-4 mt-4 bg-gray-800 border border-gray-700 rounded-lg">
                                <li>
                                    <a href="#"
                                        class="block py-2 pl-3 pr-4 text-white bg-blue-600 rounded"
                                        aria-current="page">Home</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 pl-3 pr-4 text-gray-400 rounded hover:bg-gray-700 hover:text-white">Profile</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 pl-3 pr-4 text-gray-400 rounded hover:bg-gray-700 hover:text-white">My data</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 pl-3 pr-4 text-gray-400 rounded hover:bg-gray-700 hover:text-white">Contact</a>
                                </li>
                                 <li>
                                    <a href="#"
                                        class="block py-2 pl-3 pr-4 text-gray-400 rounded hover:bg-gray-700 hover:text-white">Settings</a>
                                </li>
                                 <li>
                                    <a href="admin/logout"
                                        class="block py-2 pl-3 pr-4 text-gray-400 rounded hover:bg-gray-700 hover:text-white">Log-out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>




            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 lg:pt-20">
                <h4 class="pt-4 mt-2 font-semibold">Start Mapping</h4>
                <div class="flex items-center justify-between space-x-3 overflow-y-scroll">
                    <div
                        class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-green-200 shadow cursor-pointer hover:bg-green-300 active:bg-green-400 rounded-2xl hover:shadow-md">
                        <i class="fa-solid fa-road"></i>
                        <p class="mt-1 text-xs">Street</p>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-yellow-200 shadow cursor-pointer hover:bg-yellow-300 active:bg-yellow-400 rounded-2xl hover:shadow-md">
                        <i class="fa-solid fa-building"></i>
                        <p class="mt-1 text-xs">Building</p>
                    </div>

                    <div
                        class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-indigo-200 shadow cursor-pointer hover:bg-indigo-300 active:bg-indigo-400 rounded-2xl hover:shadow-md">
                        <i class="fa-solid fa-street-view"></i>
                        <p class="mt-1 text-xs">Open space</p>
                    </div>
                </div>

                <div class="">
                    <div id="map" class="mt-4 rounded h-[260px] lg:h-[400px] w-auto">
                    </div>
                </div>

                <h4 class="font-semibold">Your data</h4>
                <div class="grid grid-cols-1">
                    <div class="">
                        <div class="flex p-2 mb-2 bg-white shadow-md rounded-2xl">
                            <img src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                                alt="Just a flower" class="object-cover w-16 h-16 rounded-xl">
                            <div class="flex flex-col justify-center w-full px-2 py-1">
                                <div class="flex items-center justify-between ">
                                    <div class="flex flex-col">
                                        <h2 class="text-sm font-medium text-gray-800">Massive Dynamic</h2>
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
                                        <p class="font-normal">4.5</p>
                                    </div>
                                    <div class="flex items-center font-medium text-gray-900 ">
                                        Paris
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex p-2 mb-2 bg-white shadow-md rounded-2xl">
                            <img src="https://images.unsplash.com/photo-1439130490301-25e322d88054?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                                alt="Just a flower" class="object-cover w-16 h-16 rounded-xl">
                            <div class="flex flex-col justify-center w-full px-2 py-1">
                                <div class="flex items-center justify-between ">
                                    <div class="flex flex-col">
                                        <h2 class="text-sm font-medium text-gray-800">Massive Dynamic</h2>
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
                                        <p class="font-normal">4.5</p>
                                    </div>
                                    <div class="flex items-center font-medium text-gray-900 ">
                                        Paris
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
    </div>
    <scipt>
        <script>
            markers = {};

            let mymap = L.map('map').setView([38.6890, 11.14086], 2);
            osmLayer = L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    apikey: 'choisirgeoportail',
                    format: 'image/jpeg',
                    style: 'normal'
                }).addTo(mymap);
            mymap.addLayer(osmLayer);
            mymap.touchZoom.enable();
            mymap.scrollWheelZoom.disable();

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    mymap.setView([position.coords.latitude, position.coords.longitude], 17);
                    L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
                });
            }
        </script>
    @endsection
