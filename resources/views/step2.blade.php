@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="p-3 pt-16 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 h-[50vh] lg:h-[70vh] w-auto z-0"></div>
                <div x-data="{ modelOpen: true }">
                    <div x-cloak x-show="modelOpen" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div class="flex justify-center min-h-screen text-center items-end">
                            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block w-full  p-8 mt-60 overflow-hidden text-left transition-all transform bg-[#CDB8EB] shadow-xl 2xl:max-w-2xl z-50">

                                <div class="items-center space-x-4">

                                    <h1 class="text-3xl font-bold text-center text-black">How do you feel in this space?</h1>
                                    <div class="flex flex-col pt-6 space-y-6">
                                        <div class="flex justify-between w-full">
                                                <button class="">
                                                    <img src="/img/happy.png" alt="happy" class="w-16 h-16 mb-2">happy
                                                </button>
                                        
                                                <button class="">
                                                    <img src="/img/sad.png" alt="sad" class="w-16 h-16 mb-2">sad
                                                </button>

                                                <button class="">
                                                    <img src="/img/stressed.png" alt="stressed" class="w-16 h-16 mb-2">stressed
                                                </button>
                                         
                                        </div>
                                         <div class="flex justify-between w-full">
                                         
                                                <button class="">
                                                    <img src="/img/angry.png" alt="angry" class="w-16 h-16 mb-2">angry
                                                </button>
                                        
                                                <button class="">
                                                    <img src="/img/worried.png" alt="worried" class="w-16 h-16 mb-2">worried
                                                </button>

                                                <button class="">
                                                    <h1>/choose<br>other</h1>
                                                </button>
                                         
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
            function(e) {
        }, {
            enableHighAccuracy: true
        });
        } 


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function mapAction(id, type, action) {
            console.log(id);
            var url;
            switch (action) {
                case 'like':
                    url = "/place/like";
                    break;
                case 'dislike':
                    url = "/place/dislike";
                    break;
                case 'stars':
                    url = "/place/stars";
                    break;
                case 'bof':
                    url = "/place/bof";
                    break;
                case 'weird':
                    url = "/place/weird";
                    break;
                case 'ohh':
                    url = "/place/ohh";
                    break;
                case 'wtf':
                    url = "/place/wtf";
                    break;
            }

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    id: id,
                    type: type
                },
                success: function(data) {
                    if (data == 'already') {
                        document.getElementById('already').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('already').click();
                        }, 1000);
                    } else {
                        document.getElementById('point').click();
                        //close popup after 3 seconds
                        setTimeout(function() {
                            document.getElementById('point').click();
                        }, 1000);
                    }
                }
            });
         
        }
    </script>
    <style>

    </style>
@endsection
