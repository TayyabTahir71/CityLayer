@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="z-0 p-3 pt-16 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 rounded h-[75vh] lg:h-[70vh] w-auto"></div>
                @if ($infos->score > 7)
                    <button class="w-full px-4 py-6 text-2xl font-bold text-black bg-[#B8E7EB] hover:bg-blue-500">Start
                        Playing!</button>
                @else
                    <div class="w-full px-4 py-3 text-2xl font-bold text-center text-black bg-[#B8E7EB]">Tap on posts and<br>
                        react to earn points!</div>
                @endif
            </div>
        </div>

    </div>


    <div id="myModal" class="z-50 transition-all duration-300 modal">
        <div class="flex flex-col justify-center text-xl font-bold text-center text-black rounded-xl modal-content">
            <p class="pb-4">
                react to this place to earn points!
            </p>
            <div class="flex flex-row justify-center">

                <img src="/img/1.png" class="w-8 h-8 mx-1">

                <img src="/img/2.png" class="w-8 h-8 mx-1">

                <img src="/img/3.png" class="block w-8 h-8 mx-1">

                <img src="/img/4.png" class="w-8 h-8 mx-1">

                <img src="/img/5.png" class="w-8 h-8 mx-1">

                <img src="/img/6.png" class="w-8 h-8 mx-1">

                <img src="/img/7.png" class="w-8 h-8 mx-1">


            </div>
        </div>

        <script>
            data = {!! json_encode($all_data) !!};
            markers = {};
            let marker = null;
            let modal = document.getElementById("myModal");
            modal.style.display = "none";
            let mymap0 = L.map('map').setView([48.6890, 7.14086], 5);
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
                iconSize: [40, 40],
                iconAnchor: [40, 40],
                popupAnchor: [0, -40]
            });
            icon2 = L.icon({
                iconUrl: '/img/search-icon.png',
                iconSize: [40, 40],
                iconAnchor: [40, 40],
                popupAnchor: [0, -40]
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    mymap0.setView([position.coords.latitude, position.coords.longitude], 19);
                    L.marker([position.coords.latitude, position.coords.longitude], {
                        icon: icon
                    }).addTo(mymap0);
                });

            } else {
                L.map('map').setView([48.6890, 11.14086], 5);
            }

            let count = 0;
            for (let i = 0; i < data.length; i++) {
                count = count + 1;
                place = data[i];
                placeid = place.id;
                placename = place.name;
                placelatitude = place.latitude;
                placelongitude = place.longitude;
                markerx = L.marker([placelatitude, placelongitude], {
                    icon: icon2
                }).addTo(mymap0);
                markerx.on('click', function(e) {
                    modal.style.display = "block";
                    modal.onclick = function() {
                        modal.style.display = "none";
                    }
                });
                markers[place.id] = markerx;
            }
        </script>
        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                max-width: 600px;
            }
        </style>
    @endsection
