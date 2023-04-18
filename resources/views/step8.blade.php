@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
          <div id="message" class="fixed p-2 font-bold text-white bg-green-500 border rounded top-5 right-5"></div>
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
                                    <h1 class="text-2xl font-bold text-center text-black">{{ __('messages.Do you like spending time or passing through here?') }}
                                    </h1>
                                    <div class="flex flex-col pt-4 space-y-6">
                                        <div class="flex justify-between w-full">
                                            <form action="/timespending" method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <img src="/img/happy.png" alt="happy" class="w-16 h-16 mb-2">
                                                    <h1 class="font-bold ">{{ __('messages.yes') }}</h1>
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
                                                    <h1 class="font-bold ">{{ __('messages.no') }}</h1>
                                                    <input type="hidden" name="step8" value="no">
                                                </button>
                                                <input type="hidden" name="type" id="type1"
                                                    value="{{ $type }}">
                                                <input type="hidden" name="placeid" id="placeid1"
                                                    value="{{ $placeid }}">

                                            </form>
                                            <form action="/timespending" method="POST">
                                            @csrf
                                                <button type="submit">
                                                    <img src="/img/indifferent.png" alt="stressed" class="w-16 h-16 mb-2">
                                                    <h1 class="font-bold ">{{ __('messages.indifferent') }}</h1>
                                                    <input type="hidden" name="step8" value="indifferent">
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
        let mymap0 = L.map('map').setView([48.6890, 7.14086], 17);
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
            iconUrl: '/img/marker.png',
            iconSize: [40, 40],
            iconAnchor: [40, 40],
            popupAnchor: [0, -40]
        });

        var legend = L.control({ position: "topright" });
    legend.onAdd = function(mymap) {
  var div = L.DomUtil.create("div", "legend bg-gray-200 p-2 border rounded border-gray-400");
  div.innerHTML += '<button onclick="mylocation()"><i class="pr-2 fa fa-location-arrow"></i><span>My location</span><br></button>';
    return div;
    };
    legend.addTo(mymap0);

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                    mymap0.setView([position.coords.latitude, position.coords.longitude], 15);
                    L.marker([position.coords.latitude, position.coords.longitude], {
                        icon: icon
                    }).addTo(mymap0);
                },
                function(e) {}, {
                    enableHighAccuracy: true
                });
        }

         function showMessage(message) {
             var messageBox = document.getElementById("message");
             messageBox.innerHTML = message;
             messageBox.style.display = "block"; // set display to block to show the message
             setTimeout(function() {
                 messageBox.style.display = "none"; // hide the message after 3 seconds
             }, 2000);
         }

         window.onload = function() {
             showMessage("New points");
         };

                 function mylocation() {
             navigator.geolocation.getCurrentPosition(function(position) {
            mymap0.flyTo([position.coords.latitude, position.coords.longitude], 19);
             });
        }



    </script>
     <style>
         #message {
             display: none;
         }
     </style>
@endsection
