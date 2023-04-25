@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col mx-auto">
            <div class="pt-16">
                <div class="relative">
                    <div id="map" class="absolute mt-4 w-[100vw] z-10 h-[85vh]"></div>
                </div>
                <div x-data="{ modelOpen: false }">
                    <div
                        class="fixed bottom-0 w-full py-6 text-2xl font-bold text-black bg-[#B8E7EB] active:bg-blue-400 text-center z-50">
                        <a class="mx-12" @click="modelOpen =!modelOpen" onclick="zoom()">
                            {{ __('messages.Start Playing!') }}</a>

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
                                class="inline-block w-screen p-8 mt-60 overflow-hidden text-left transition-all transform bg-[#B8E7EB] shadow-xl z-50">

                                <div class="items-center space-x-4 bloc">

                                    <h1 class="text-3xl font-bold text-center text-black">
                                        {{ __('messages.This space is...') }}</h1>
                                    <div class="flex flex-col pt-6">
                                        <div class="flex justify-center">

                                            <a href="street"> <button
                                                    class="w-32 h-32 mx-4 py-6 text-gray-100 bg-[#55C5CF] hover:bg-blue-400  focus:outline-none hover:text-gray-200 rounded-full">
                                                    <i
                                                        class="fa-solid fa-road"></i><br>{{ __('messages.a street') }}</button>
                                            </a>
                                        </div>
                                        <div class="flex justify-center space-x-6">
                                            <a href="building">
                                                <button
                                                    class="w-32 h-32 py-6 text-gray-100 bg-[#55C5CF] hover:bg-blue-400 rounded-full focus:outline-none hover:text-gray-200">
                                                    <i
                                                        class="fa-solid fa-building"></i><br>{{ __('messages.a building') }}</button>
                                            </a>
                                            <a href="openspace">
                                                <button
                                                    class="w-32 h-32  py-6 text-gray-100 bg-[#55C5CF] hover:bg-blue-400 rounded-full focus:outline-none hover:text-gray-200">
                                                    <i
                                                        class="fa-solid fa-street-view"></i><br>{{ __('messages.an open space') }}</button>
                                            </a>
                                        </div>
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
    navigator.geolocation.getAccurateCurrentPosition = function (geolocationSuccess, geolocationError, geoprogress, options) {
    var lastCheckedPosition,
        locationEventCount = 0,
        watchID,
        timerID;

    options = options || {};

    var checkLocation = function (position) {
        lastCheckedPosition = position;
        locationEventCount = locationEventCount + 1;
        // We ignore the first event unless it's the only one received because some devices seem to send a cached
        // location even when maxaimumAge is set to zero
        if ((position.coords.accuracy <= options.desiredAccuracy) && (locationEventCount > 1)) {
            clearTimeout(timerID);
            navigator.geolocation.clearWatch(watchID);
            foundPosition(position);
        } else {
            geoprogress(position);
        }
    };

    var stopTrying = function () {
        navigator.geolocation.clearWatch(watchID);
        foundPosition(lastCheckedPosition);
    };

    var onError = function (error) {
        clearTimeout(timerID);
        navigator.geolocation.clearWatch(watchID);
        geolocationError(error);
    };

    var foundPosition = function (position) {
        geolocationSuccess(position);
    };

    if (!options.maxWait)            options.maxWait = 10000; // Default 10 seconds
    if (!options.desiredAccuracy)    options.desiredAccuracy = 20; // Default 20 meters
    if (!options.timeout)            options.timeout = options.maxWait; // Default to maxWait

    options.maximumAge = 0; // Force current locations only
    options.enableHighAccuracy = true; // Force high accuracy (otherwise, why are you using this function?)

    watchID = navigator.geolocation.watchPosition(checkLocation, onError, options);
    timerID = setTimeout(stopTrying, options.maxWait); // Set a timeout that will abandon the location loop
};
</script>

    <script>
        data = {!! json_encode($all_data) !!};
        userid = {!! json_encode($userid) !!};
        markers = {};
        let marker = null;
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 17);
        // https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png

        osmLayer0 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 19,
            ext: 'png'
        }).addTo(mymap0);
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
        legend.onAdd = function(mymap) {
            var div = L.DomUtil.create("div", "legend bg-gray-200 p-2 border border-gray-400 rounded");
            div.innerHTML +=
                '<button class="" onclick="mylocation()"><i class="pr-2 fa fa-location-arrow"></i><span>My location</span><br></button>';
            return div;
        };
        legend.addTo(mymap0);


        if (navigator && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function() {}, function() {}, {});
            //The working next statement.
            navigator.geolocation.getCurrentPosition(function(position) {
                   mymap0.setView([position.coords.latitude, position.coords.longitude], 10);
            L.marker([position.coords.latitude, position.coords.longitude], {
                icon: icon
            }).addTo(mymap0);
            }, function(e) {
                 alert("The request to get user location timed out.");
            }, {
                      enableHighAccuracy: true,
            maximumAge: 0,
            timeout: 60000,
            });

        } else {
            alert("Geolocation is not supported by this browser.");
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
                '" class="flex justify-center px-2 py-2 text-center bg-blue-600 rounded"><button class="text-white">' +
                readmore + '</button><a>'
            );

            markers[place.id] = markerx;
        }

        function mylocation() {
            navigator.geolocation.getCurrentPosition(function(position) {
                mymap0.flyTo([position.coords.latitude, position.coords.longitude], 19);
            });
        }

        function zoom() {
            navigator.geolocation.getCurrentPosition(function(position) {
                mymap0.flyTo([position.coords.latitude, position.coords.longitude], 16);
            });
        }
    </script>
    <style>

    </style>
@endsection
