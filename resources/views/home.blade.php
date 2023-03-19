@extends('layouts.app')

@section('main')
    <div data-barba="container">
             @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 rounded h-[80vh] lg:h-[70vh] w-auto"></div>
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
                L.marker([position.coords.latitude, position.coords.longitude], {
                    icon: icon
                }).addTo(mymap0);
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
