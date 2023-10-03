@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
            <div class="">
                <div class="relative">
                    <div class="" x-cloak x-data="{ show: false }">
                        <div class="absolute z-20 p-2 bg-black rounded-lg top-8 left-4" @click="show=true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-8 h-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </div>

                        <div x-show="show" @click.outside="show=false"
                            class="z-30 absolute top-20 left-4 w-[60%] bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="/admin/logout"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div onclick="mylocation()"
                        class="fixed z-20 flex items-center justify-center p-4 bg-black rounded-full cursor-pointer bottom-28 left-4">
                        <img src="{{ asset('img/triangle.png') }}" class="w-7 h-7" alt="">
                    </div>
                    <a href="/filter"
                        class="fixed z-20 flex items-center justify-center p-5 bg-white border-2 border-black rounded-full bottom-28 right-4">
                        <div class="">👁️</div>
                    </a>

                    <div id="map" class="absolute w-[100vw] z-10 h-[90vh]"></div>
                </div>
                <div x-data="{ modelOpen: false }">
                    <div
                        class="fixed bottom-0 z-50 w-full pt-3 pb-8 text-xl font-semibold text-center shadow-xl rounded-t-3xl bg-gray-50 ">

                        <div class="flex items-center justify-center">
                            <div class="py-0.5 w-14 mb-7 rounded-full px-4 bg-black">

                            </div>

                        </div>


                        <div class="flex">
                            <div class="absolute left-16 bottom-[18px] ">
                                <div class="p-3 bg-[#ffa726] border-2 border-white rounded-full">
                                    <span class="w-8 h-4"> 🔍</span>
                                </div>

                            </div>
                            <div class="absolute left-6 bottom-[18px] ">
                                <div class="p-3 bg-[#1976d2] border-2 border-white rounded-full">
                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" alt="">
                                </div>

                            </div>
                        </div>

                        <a class="w-full pt-4" @click="modelOpen =!modelOpen">
                            <span class="w-full px-12 py-4 text-white bg-[#2d9bf0] rounded-3xl">
                                Add to map
                            </span>

                        </a>

                        <div class="absolute right-5 bottom-[25px] ">
                            <div class="p-1 bg-[#1976d2] rounded-full w-9">
                                <span class="italic font-bold text-white">
                                    i
                                </span>
                            </div>
                        </div>

                    </div>


                    <div x-cloak x-show="modelOpen " class="fixed bottom-0 z-50 overflow-y-auto"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center text-center">
                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                            </div>

                            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="z-50 w-screen p-4 transition-all transform bg-white h-[50%] shadow-xl mt-60 rounded-t-3xl">

                                <div class="px-1 pt-4" x-data="{ tab: 'place' }">

                                    <input type="text" class="w-full px-2 py-2 bg-white rounded-full"
                                        placeholder="Choose tags or add new city layers" name="input" id="">



                                    <div class="flex items-center justify-center mt-12">
                                        <div class="-mr-1 cursor-pointer" @click="tab='place'">
                                            <div class="flex flex-col w-[75px] justify-center items-center">
                                                <div class="bg-[#1976d2] border-2 border-white rounded-full shadow-xl"
                                                    :class="tab == 'place' || tab == 'place1' ?
                                                        'bg-[#1976d2] z-10 p-[22px]' :
                                                        'bg-[#1976d2]/70 p-[35px]'">
                                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                                        :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'"
                                                        id="place" alt="">
                                                </div>
                                                <div class="pl-2 font-semibold text-center"
                                                    :class="tab == 'place' ? 'text-black' : 'text-black/50'">
                                                    Browse Places
                                                </div>
                                            </div>
                                        </div>
                                        <div class="-ml-1 cursor-pointer" @click="tab='observation'">
                                            <div class="flex flex-col w-[75px] justify-center items-center">

                                                <div class="flex items-center justify-center border-2 border-white rounded-full shadow-xl"
                                                    :class="tab == 'observation' || tab == 'observation1' ?
                                                        'bg-[#ffa726] z-10 p-[16px]' :
                                                        'bg-[#ffa726]/70 p-[35px]'">
                                                    <span class="flex items-center justify-center w-10 h-10"
                                                        :class="tab == 'observation' || tab == 'observation1' ? 'block' :
                                                            'hidden'"
                                                        id="observation" alt="">🔍</span>
                                                </div>

                                                <div class="pl-8 font-semibold text-center"
                                                    :class="tab == 'observation' ? 'text-black' : 'text-black/50'">
                                                    Browse Observation
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="" x-data="{ active: '' }">

                                        <div class="flex items-center justify-center gap-10 mt-6 italic font-semibold all-places"
                                            x-show="tab=='place'">

                                            <div class="flex flex-col items-center justify-center cursor-pointer"
                                                @click="active='PL_{{ $allPlaces[0]->id }}'"
                                                onclick="select_place({{ $allPlaces[0]->id }})">
                                                <div class="rounded-full bg-[#1976d2] p-[20px] "
                                                    :class="active == 'PL_{{ $allPlaces[0]->id }}' ?
                                                        'border-4 border-blue-300' :
                                                        ''">
                                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                                                </div>
                                                <span class="mt-2 text-black">{{ $allPlaces[0]->name }}</span>
                                            </div>

                                            <div class="flex flex-col items-center justify-center cursor-pointer"
                                                @click="active='PL_{{ $allPlaces[1]->id }}'"
                                                onclick="select_place({{ $allPlaces[1]->id }})">
                                                <div class="rounded-full bg-[#1976d2] p-[20px]"
                                                    :class="active == 'PL_{{ $allPlaces[1]->id }}' ?
                                                        'border-4 border-blue-300' :
                                                        ''">
                                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                                                </div>
                                                <span class="mt-2 text-black">{{ $allPlaces[1]->name }}</span>
                                            </div>

                                            <div class="flex flex-col items-center justify-center cursor-pointer">
                                                <button onclick="see()">
                                                    <div class="rounded-full border-blue-500 border-2  p-[22px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                            class="w-6 h-6 font-bold text-blue-500">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v12m6-6H6" />
                                                        </svg>

                                                    </div>
                                                    <span class="mt-2 text-black">See more</span>
                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="" x-data="{ active: '' }">
                                        <div class="flex items-center justify-center gap-10 mt-6 italic font-semibold"
                                            x-show="tab=='observation'">
                                            <div class="flex flex-col items-center justify-center cursor-pointer"
                                                @click="active='OB_{{ $allObservations[0]->id }}'"
                                                onclick="select_observation({{ $allObservations[0]->id }})">
                                                <div class="rounded-full bg-[#ffa726]  px-[8px] py-[18px]"
                                                    :class="active == 'OB_{{ $allObservations[0]->id }}' ?
                                                        'border-4 border-yellow-100' :
                                                        ''">

                                                    <div class="flex">
                                                        <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                            class="w-8 h-8 -mr-1"> <img
                                                            src="{{ asset('new_img/happy.png') }}" alt=""
                                                            class="w-8 h-8 -ml-1">
                                                    </div>

                                                </div>
                                                <span class="mt-2 text-black">{{ $allObservations[0]->name }}</span>

                                            </div>

                                            <div class="flex flex-col items-center justify-center cursor-pointer"
                                                @click="active='OB_{{ $allObservations[1]->id }}'"
                                                onclick="select_observation({{ $allObservations[1]->id }})">
                                                <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                                                    :class="active == 'OB_{{ $allObservations[1]->id }}' ?
                                                        'border-4 border-yellow-100' :
                                                        ''">
                                                    <div class="flex">
                                                        <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                            class="w-8 h-8 -mr-1"> <img
                                                            src="{{ asset('new_img/happy.png') }}" alt=""
                                                            class="w-8 h-8 -ml-1">
                                                    </div>
                                                </div>
                                                <span class="mt-2 text-black">{{ $allObservations[1]->name }}</span>

                                            </div>

                                            <div class="flex flex-col items-center justify-center cursor-pointer">
                                                <button onclick="see()" type="button">
                                                    <div class="rounded-full border-[#ffa726] border-2  p-[22px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                            class="w-6 h-6 font-bold text-[#ffa726]">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 6v12m6-6H6" />
                                                        </svg>

                                                    </div>
                                                    <span class="mt-2 text-black">See more</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-center mt-8">
                                        <div onclick="submitData()"
                                            class="flex cursor-pointer items-center justify-center gap-2 px-4 py-3 text-lg font-extrabold text-white bg-[#1976d2] rounded-3xl hover:shadow  hover:bg-blue-400 transition-all">
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="3" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg> --}}
                                            Submit</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="myfeel2" x-data="{ seeMore: false }">
                        <button id="othertag" @click="seeMore =!seeMore" class="hidden"></button>

                        <div x-cloak x-show="seeMore" class="absolute inset-0 z-[60] bg-white"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">

                            <div x-cloak x-show="seeMore" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="z-50 w-full max-w-xl transition-all transform">

                                <div class="px-4 pt-4" x-data="{ tab: 'place' }">
                                    <div @click="seeMore=false"
                                        class="flex justify-start items-start bg-black my-4 mx-2 p-1.5 w-7 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                                        </svg>

                                    </div>

                                    <input type="text" class="w-full px-2 py-2 bg-white rounded-full"
                                        placeholder="Choose tags or add new city layers" name="input" id="">



                                    <div class="flex items-center justify-center mt-12">
                                        <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="place()">
                                            <div class="flex flex-col w-[75px] justify-center items-center">
                                                <div class="bg-[#1976d2] border-2 border-white rounded-full shadow-xl"
                                                    :class="tab == 'place' || tab == 'place1' ?
                                                        'bg-[#1976d2] z-10 p-[22px]' :
                                                        'bg-[#1976d2]/70 p-[35px]'">
                                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                                        :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'"
                                                        id="place" alt="">
                                                </div>
                                                <div class="pl-2 font-semibold text-justify"
                                                    :class="tab == 'place' ? 'text-black' : 'text-black/50'">
                                                    Browse Places
                                                </div>
                                            </div>
                                        </div>
                                        <div class="-ml-2 cursor-pointer" @click="tab='observation'"
                                            onclick="observation()">
                                            <div class="flex flex-col w-[75px] justify-center items-center">

                                                <div class="flex items-center justify-center border-2 border-white rounded-full shadow-xl"
                                                    :class="tab == 'observation' || tab == 'observation1' ?
                                                        'bg-[#ffa726] z-10 p-[16px]' :
                                                        'bg-[#ffa726]/70 p-[35px]'">
                                                    <span class="flex items-center justify-center w-10 h-10"
                                                        :class="tab == 'observation' || tab == 'observation1' ? 'block' :
                                                            'hidden'"
                                                        id="observation" alt="">🔍</span>
                                                </div>

                                                <div class="pl-8 font-semibold text-justify"
                                                    :class="tab == 'observation' ? 'text-black' : 'text-black/50'">
                                                    Browse Observation
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-data="{ active: '' }">
                                        <div class="flex flex-col items-center justify-center gap-10 mt-6 italic font-semibold"
                                            x-show="tab=='place'">
                                            <div class="grid grid-cols-3 gap-8">
                                                @foreach ($allPlaces as $pls)
                                                    <div class="flex flex-col items-center justify-center w-[80px]"
                                                        @click="active='PL_{{ $pls->id }}'"
                                                        onclick="select_place({{ $pls->id }})">
                                                        <div class="rounded-full bg-[#1976d2]  p-[20px]"
                                                            :class="active == 'OB_{{ $pls->id }}' ?
                                                                'border-4 border-blue-300' :
                                                                ''">
                                                            <img src="{{ asset('new_img/image.png') }}"
                                                                class="w-7 h-7" />
                                                        </div>
                                                        <span class="mt-2 text-black">{{ $pls->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                    <div x-data="{ active: '' }">
                                        <div class="flex flex-col items-center justify-center gap-10 mt-6 italic font-semibold"
                                            x-show="tab=='observation'">
                                            <div class="grid grid-cols-3 gap-8">
                                                @foreach ($allObservations as $obs)
                                                    <div class="flex flex-col items-center justify-center w-[80px]"
                                                        @click="active='OB_{{ $pls->id }}'"
                                                        onclick="select_observation({{ $pls->id }})">
                                                        <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                                                            :class="active == 'OB_{{ $obs->id }}' ?
                                                                'border-4 border-yellow-100' :
                                                                ''">
                                                            <div class="flex">
                                                                <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                                    class="w-8 h-8 -mr-1"> <img
                                                                    src="{{ asset('new_img/happy.png') }}" alt=""
                                                                    class="w-8 h-8 -ml-1">
                                                            </div>
                                                        </div>

                                                        <span class="mt-2 text-black">{{ $obs->name }}</span>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>



                                    <div class="flex items-center  justify-center pt-[20%] pb-4 bg-white">
                                        <div onclick="submitData()"
                                            class="flex cursor-pointer items-center justify-center gap-2 px-4 py-3 text-lg font-extrabold text-white bg-[#1976d2] rounded-3xl hover:shadow  hover:bg-blue-400 transition-all">

                                            Submit</div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="mysubplace" x-data="{ subPlace: false }">
                        <button id="othertag" @click="subPlace =!subPlace" class="hidden"></button>
                    </div>


                </div>


            </div>
        </div>


        <input class="hidden" type="text" name="latitude" id="latitude" value="">
        <input class="hidden" type="text" name="longitude" id="longitude" value="">
    </div>


    <script>
        data = {!! json_encode($all_data) !!};
        userid = {!! json_encode($userid) !!};
        markers = {};
        let marker = null;
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 6);
        // https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png

        osmLayer0 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 19,
            ext: 'png'
        }).addTo(mymap0);
        mymap0.zoomControl.remove();
        mymap0.addLayer(osmLayer0);
        mymap0.touchZoom.enable();
        mymap0.scrollWheelZoom.enable();



        var currentPosIcon = L.icon({
            iconUrl: '/new_img/current-pos.svg', // Replace with the path to your icon image
            iconSize: [45, 45], // Adjust the icon size as needed
            iconAnchor: [16, 16], // Adjust the anchor point of the icon
            popupAnchor: [0, -16] // Adjust the popup anchor for the icon
        });


        var placeIcon = L.divIcon({
            className: 'transparent-icon',
            html: `<div class="rounded-full bg-[#1976d2] p-[16px] flex justify-center items-center" style="width: 54px"><img src="{{ asset('new_img/image.png') }}" class="w-6 h-6" /></div>`
        });
        var observationIcon = L.divIcon({
            className: 'transparent-icon',
            html: `<div class="rounded-full bg-[#ffa726] p-[16px] flex justify-center items-center" style="width: 52px"">
                    <div class="flex">
                     <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-5 h-5 -mr-1">
                     <img src="{{ asset('new_img/happy.png') }}" alt="" class="w-5 h-5 -ml-1">
                    </div>
                 </div>`
        });



        if (navigator.geolocation) {
            //wait 3 seconds to get position
            console.log(getposition(success, fail));

        } else {
            alert("Geolocation is not supported by this browser.");
        }


        function getposition(success, fail) {

            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        document.getElementById('latitude').value = pos.coords.latitude.toFixed(6);
                        document.getElementById('longitude').value = pos.coords.longitude.toFixed(6);
                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }

        }




        function success(lat, lng) {
            mymap0.setView([lat, lng], 10);

            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }

        console.log(data);

        let count = 0;
        for (let i = 0; i < data.length; i++) {

            count = count + 1;
            place = data[i];
            placeid = place.place_id;
            observationid = place.observation_id;
            observationname = 'No Obervation';
            placename = 'No Place';

            if (place.place) {
                placename = place.place.name;
            }
            if (place.observation) {
                observationname = place.observation.name;
            }

            username = place.user.name;


            // pics = place.image0;
            placelatitude = place.latitude;
            placelongitude = place.longitude;

            if (placeid && observationid == null) {
                icon2 = placeIcon;
            }
            if (placeid == null && observationid) {
                icon2 = observationIcon;
            }
            markerx = L.marker([placelatitude, placelongitude], {
                icon: icon2
            }).addTo(mymap0).bindPopup(
                `<div class="bg-[#2d9bf0] p-0 w-full"><div class="flex items-center justify-start gap-4  -mb-2"> <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-[#ffa726] border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <img src="{{ asset('img/cam.PNG') }}" alt="" class="w-6 h-6 mt-4">
            <span class="mt-4 text-lg italic font-extrabold text-white">` + observationname + `</span>
        </div>
        <div class="flex items-center justify-start gap-4">
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-[#1976d2] border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-6 h-6 mt-4">
            <span class="mt-4 text-lg italic font-extrabold text-white">` + placename + `</span>
        </div>

        <textarea type="text" value="" class="pl-24 bg-[#2d9bf0] border-0 pr-4 mt-1 italic font-semibold text-white" />Place for a comment max 120 characters</textarea>


        <span class="flex items-end justify-end px-2 mt-6 -mb-3 italic font-semibold text-white">
            Added by ` + username + ` on 2023-12-19
        </span>
    </div>`
            );

            markers[place.id] = markerx;
        }

        function mylocation() {
            getmyposition(success, fail);
        }


        function getmyposition(success, fail) {

            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        console.log(pos)
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;

                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }
        }

        function success(lat, lng) {
            mymap0.flyTo([lat, lng], 19);
            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }

        function zoom() {
            myzoom(success, fail);
        }

        function myzoom(success, fail) {
            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }
        }

        function success(lat, lng) {
            mymap0.flyTo([lat, lng], 16);
            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }

        function see() {

            var btnid = document.getElementById("othertag");
            btnid.click();
        }

        var placeId = '';

        function select_place(id) {
            placeId = id;
        }

        var observationId = '';

        function select_observation(id) {
            observationId = id;
        }



        function submitData() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            latitude = document.getElementById('latitude').value;
            longitude = document.getElementById('longitude').value;

            $.ajax({
                type: 'POST',
                url: "{{ route('map.add.place') }}",
                data: {
                    place_id: placeId,
                    observation_id: observationId,
                    latitude: latitude,
                    longitude: longitude,
                },
                success: function(data) {
                    swal({
                        icon: "success",
                        text: data.msg,

                    })
                    if (data.subPlsId) {
                        window.location.href = "/sub-place/" + data.subPlsId;
                    }

                }
            });

        }


        function subPlaces(id) {
            window.location.href = "/sub-place/" + id;
        }
    </script>
    <style>

    </style>
@endsection
