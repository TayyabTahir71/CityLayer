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

                    <div class="absolute top-8 left-4 p-2 rounded-lg bg-black z-20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>

                    <div class="absolute top-[80vh] left-4 p-4 flex justify-center items-center rounded-full bg-black z-20">
                        <img src="{{ asset('img/triangle.png') }}" class="w-7 h-7" alt="">
                    </div>

                    <div id="map" class="absolute w-[100vw] z-10 h-[90vh]"></div>
                </div>
                <div x-data="{ modelOpen: false }">
                    <div
                        class="fixed bottom-0 w-full pb-8 pt-3 text-xl font-semibold rounded-t-3xl bg-gray-50  shadow-xl  text-center z-50 ">

                        <div class="flex justify-center items-center">
                            <div class="py-0.5 w-14 mb-7 rounded-full px-4 bg-black">

                            </div>

                        </div>


                        <div class="flex">
                            <div class="absolute left-16 bottom-[11px] ">
                                <div class="p-3 rounded-full bg-yellow-500 border-2 border-black">
                                    <img src="{{ asset('img/search-icon.png') }}" class="w-7 h-7" alt="">
                                </div>

                            </div>
                            <div class="absolute left-6 bottom-[11px] ">
                                <div class="p-3 rounded-full bg-cyan-500 border-2 border-black">
                                    <img src="{{ asset('img/image.png') }}" class="w-7 h-7" alt="">
                                </div>

                            </div>
                        </div>

                        <a class="w-full pt-4" @click="modelOpen =!modelOpen">
                            <span class="bg-cyan-500 py-4 rounded-3xl text-white w-full px-12">
                                Add on map
                            </span>

                        </a>

                        <div class="absolute right-5 bottom-[25px] ">
                            <div class="p-1 rounded-full bg-cyan-500 w-9">
                                <span class="italic  text-white font-bold">
                                    i
                                </span>
                            </div>
                        </div>

                    </div>


                    <div x-cloak x-show="modelOpen" class="fixed bottom-0 z-50 overflow-y-auto"
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
                                class="inline-block w-screen p-4 mt-60 overflow-hidden text-left bg-white rounded-t-3xl transition-all transform shadow-xl z-50">

                                <div class="px-1 pt-4" x-data="{ tab: 'place' }">

                                    <input type="text" class="rounded-full px-2 w-full bg-white py-2"
                                        placeholder="Choose tags or add new city layers" name="input" id="">


                                    <div class="flex mt-20 justify-center items-center">
                                        <div class="absolute left-[48%] top-[90px] cursor-pointer" @click="tab='feature'"
                                            onclick="feature()">
                                            <div class="flex flex-col">

                                                <div class="rounded-full shadow-xl  border-2 border-black"
                                                    :class="tab == 'feature' ? 'bg-yellow-500 p-[22px]' :
                                                        'bg-yellow-500/70 p-[35px]'">
                                                    <img src="{{ asset('img/search-icon.png') }}" class="w-7 h-7"
                                                        :class="tab == 'feature' ? 'block' : 'hidden'" id="feature"
                                                        alt="">
                                                </div>



                                            </div>

                                        </div>
                                        <div class="absolute left-[37%] top-[90px] cursor-pointer" @click="tab='place'"
                                            onclick="place()">
                                            <div class="flex flex-col">
                                                <div class="rounded-full shadow-xl bg-cyan-500 border-2 border-black"
                                                    :class="tab == 'place' ? 'bg-cyan-500 p-[22px]' :
                                                        'bg-cyan-500/70 p-[35px]'">
                                                    <img src="{{ asset('img/image.png') }}" class="w-7 h-7"
                                                        :class="tab == 'place' ? 'block' : 'hidden'" id="place"
                                                        alt="">
                                                </div>

                                            </div>


                                        </div>


                                    </div>

                                    <div class="flex mt-44 justify-center items-center italic">
                                        <div class="absolute left-[52%] top-[170px] cursor-pointer" @click="tab='feature'"
                                            onclick="place()">


                                            <div class="w-8" :class="tab == 'feature' ? 'text-black' : 'text-black/50'">
                                                Browse Observation
                                            </div>

                                        </div>
                                        <div class="absolute left-[37%] top-[170px] cursor-pointer" @click="tab='place'"
                                            onclick="feature()">

                                            <div class="w-8" :class="tab == 'place' ? 'text-black' : 'text-black/50'">
                                                Browse Places
                                            </div>




                                        </div>


                                    </div>



                                    <div class="flex absolute left-16 right-16 top-[230px] gap-3 italic"
                                        x-show="tab=='place'">
                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full bg-cyan-500 border-2  border-black p-[35px]">

                                            </div>
                                            <span class="text-black mt-2">Place 1</span>
                                        </div>

                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full bg-cyan-500 border-2  border-black p-[35px]">

                                            </div>
                                            <span class="text-black mt-2">Place 2</span>
                                        </div>

                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full border-cyan-500 border-2  p-[22px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    class="w-6 h-6 font-bold text-cyan-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>

                                            </div>
                                            <span class="text-black mt-2">See more</span>
                                        </div>





                                    </div>
                                    <div class="flex absolute left-16 right-16 top-[230px] gap-3 italic"
                                        x-show="tab=='feature'">
                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full bg-yellow-500 border-2  border-black p-[35px]">

                                            </div>
                                            <span class="text-black mt-2">Feature 1</span>
                                        </div>

                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full bg-yellow-500 border-2  border-black p-[35px]">

                                            </div>
                                            <span class="text-black mt-2">Feature 2</span>
                                        </div>

                                        <div class="flex justify-center items-center flex-col">
                                            <div class="rounded-full border-yellow-500 border-2  p-[22px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                    class="w-6 h-6 font-bold text-yellow-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>

                                            </div>
                                            <span class="text-black mt-2">See more</span>
                                        </div>





                                    </div>



                                    <div class="mt-8 flex justify-center items-center ">
                                        <button
                                            class="px-4 flex justify-center items-center gap-2  py-3 font-extrabold rounded-3xl text-lg bg-cyan-500 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="3" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Add new</button>
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
        icon = L.icon({
            iconUrl: '/img/openspace.png',
            iconSize: [25, 25],
            iconAnchor: [25, 25],
            popupAnchor: [0, -25]
        });


        var legend = L.control({
            position: "topright"
        });
        // legend.onAdd = function(mymap) {
        //     var div = L.DomUtil.create("div", "legend bg-gray-200 p-2 border border-gray-400 rounded");
        //     div.innerHTML +=
        //         '<button class="" onclick="mylocation()"><i class="pr-2 fa fa-location-arrow"></i><span>My location</span><br></button>';
        //     return div;
        // };
        legend.addTo(mymap0);


        if (navigator.geolocation) {
            //wait 3 seconds to get position
            getposition(success, fail);
        } else {
            alert("Geolocation is not supported by this browser.");
        }


        /*  function getposition() {
              navigator.geolocation.getCurrentPosition(
                  (position) => {
                      mymap0.setView([position.coords.latitude, position.coords.longitude], 10);
                      L.marker([position.coords.latitude, position.coords.longitude], {
                          icon: icon
                      }).addTo(mymap0);
                  },
                  (e) => {
                     $.getJSON('https://ipinfo.io/geo', function(response) {
          var loc = response.loc.split(',');
          var coords = {
              latitude: loc[0],
              longitude: loc[1]
          };
           mymap0.setView([coords.latitude, coords.longitude], 10);
                      L.marker([coords.latitude, coords.longitude], {
                          icon: icon
                      }).addTo(mymap0);
          });
                  }, {
                      enableHighAccuracy: true,
                  }
              );
          }
          */

        function getposition(success, fail) {
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
            mymap0.setView([lat, lng], 10);
            L.marker([lat, lng], {
                icon: icon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }




        let count = 0;
        for (let i = 0; i < data.length; i++) {

            count = count + 1;
            place = data[i];
            placeid = place.id;
            placetype = place.type;

            if (place.user_id == userid) {
                icon2 = L.icon({
                    iconUrl: '/img/marker.png',
                    iconSize: [25, 25],
                    iconAnchor: [25, 25],
                    popupAnchor: [0, -25]
                });
            } else {
                icon2 = L.icon({
                    iconUrl: '/img/street.png',
                    iconSize: [25, 25],
                    iconAnchor: [25, 25],
                    popupAnchor: [0, -25]
                });
            }


            placename = place.name;
            pics = place.image0;
            placelatitude = place.latitude;
            placelongitude = place.longitude;
            if (place.user_id == userid) {
                placetype = place.type.toLowerCase();
                var url = "place";
                var message = '';
                var readmore = '{{ __('messages.Edit this place') }}';
            } else {
                var url = "details";
                var message = '{{ __('messages.React to this place to earn 1 point!') }}';
                var readmore = '{{ __('messages.Read more') }}';
            }
            markerx = L.marker([placelatitude, placelongitude], {
                icon: icon2
            }).addTo(mymap0).bindPopup(
                '<div class="flex flex-col justify-center text-xl font-bold text-center text-black rounded-xl"><p id="title" class="px-4 text-sm">' +
                message + '</p></div><a href="' + url + '/' + placeid + '/' + placetype +
                '" class="flex justify-center px-2 py-2 text-center bg-cyan-600 rounded"><button class="text-white">' +
                readmore + '</button><a>'
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
                icon: icon
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
                icon: icon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }


        function place() {

        }
    </script>
    <style>

    </style>
@endsection
