@extends('layouts.app')

@section('main')
    <div data-barba="container">
             @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="z-0 p-3 pt-16 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 rounded h-[80vh] lg:h-[70vh] w-auto"></div>
             <button class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" onclick="modal.style.display = 'block'">Start Mapping</button>
            </div>
        </div>
       
    </div>


    <div id="myModal" class="z-50 transition-all duration-300 modal">
  <div class="text-black modal-content">
      <p>
    what do you want to map?
    </p>
  </div>
</div>
    
    <script>
        let marker = null;
        let modal = document.getElementById("myModal");
        modal.style.display = "none";
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
                mymap0.setView([position.coords.latitude, position.coords.longitude], 19);
                L.marker([position.coords.latitude, position.coords.longitude], {
                    icon: icon
                }).addTo(mymap0);
            });
            
        } 

            mymap0.on('click', function(e) {
                if (marker) {
                    mymap0.removeLayer(marker);
                }
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap0);
            });
        
        
  window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
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
            background-color: black;
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
