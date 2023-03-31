@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
            <div class="">
                <div id="map" class="h-[75vh] lg:h-[75vh] w-auto z-0"></div>
                <div x-data="{ modelOpen: true }">
                    <div x-cloak x-show="modelOpen" class="fixed bottom-0 w-screen overflow-y-auto"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center text-center">
                            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="flex justify-center w-screen p-8 overflow-hidden text-left transition-all transform bg-[#FAC710] shadow-xl z-50">

                                <div class="items-center max-w-2xl space-x-4">
                                    <h1 class="text-2xl font-bold text-center text-black">Do you like spending time or
                                        passing through here?
                                    </h1>
                                    <div class="flex flex-col pt-4 space-y-6">
                                        <div class="flex justify-between w-full">
                                            <form action="/timespending" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <img src="/img/happy.png" alt="happy" class="w-16 h-16 mb-2">
                                                    <h1 class="font-bold ">yes</h1>
                                                    <input type="hidden" name="step8" value="yes">
                                                </button>
                                                <input type="hidden" name="type" id="type0"
                                                    value="{{ $type }}">
                                                <input type="hidden" name="placeid" id="placeid0"
                                                    value="{{ $placeid }}">

                                            </form>
                                            <form action="/timespending" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <img src="/img/sad.png" alt="sad" class="w-16 h-16 mb-2">
                                                    <h1 class="font-bold ">no</h1>
                                                    <input type="hidden" name="step8" value="no">
                                                </button>
                                                <input type="hidden" name="type" id="type1"
                                                    value="{{ $type }}">
                                                <input type="hidden" name="placeid" id="placeid1"
                                                    value="{{ $placeid }}">

                                            </form>
                                            <form action="/timespending" method="POST">
                                                <button type="submit">
                                                    <img src="/img/worried.png" alt="stressed" class="w-16 h-16 mb-2">
                                                    <h1 class="font-bold ">i don't know</h1>
                                                    <input type="hidden" name="step8" value="dontknow">
                                                </button>
                                                <input type="hidden" name="type" id="type2"
                                                    value="{{ $type }}">
                                                <input type="hidden" name="placeid" id="placeid2"
                                                    value="{{ $placeid }}">

                                            </form>
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
        markers = {};
        let marker = null;
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 15);
        osmLayer0 = L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                apikey: 'choisirgeoportail',
                format: 'image/jpeg',
                style: 'normal'
            }).addTo(mymap0);
        mymap0.addLayer(osmLayer0);
        mymap0.touchZoom.enable();
        mymap0.scrollWheelZoom.enable();
        icon = L.icon({
            iconUrl: '/img/marker.png',
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
                },
                function(e) {}, {
                    enableHighAccuracy: true
                });
        }
    </script>
    <style>

    </style>
@endsection
