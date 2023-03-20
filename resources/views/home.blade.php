@extends('layouts.app')

@section('main')
    <div data-barba="container">
             @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">
            <div class="z-0 p-3 pt-16 lg:mx-16 md:pt-20">
                <div id="map" class="mt-4 rounded h-[75vh] lg:h-[70vh] w-auto"></div>
             @if ($infos->mapping == 1)
             <button class="w-full px-4 py-6 font-bold text-black bg-[#B8E7EB] hover:bg-blue-500">Start Mapping</button>
             @else
             <div class="w-full px-4 py-3 text-2xl font-bold text-center text-black bg-[#B8E7EB]">Tap on posts and<br> react to earn points!</div>
                @endif
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

           // mymap0.on('click', function(e) {
            //    if (marker) {
            //        mymap0.removeLayer(marker);
             //   }
           //     marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap0);
          //  });
        
        
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
