 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="flex flex-col h-screen mx-auto">
             <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
                 <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-white fas fa-arrow-left"></i></a>
                 <div id="map0" class="rounded h-[200px] lg:h-[400px] w-auto"></div>
                 <input class="text-black" type="text" name="latitude" id="latitude" value="">
                 <input class="pt-2 text-black" type="text" name="longitude" id="longitude" value="">

             </div>
         </div>
     </div>
     <script>
         let marker = null;

         let mymap = L.map('map0').setView([38.6890, 11.14086], 2);
         osmLayer = L.tileLayer(
             'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                 maxZoom: 19,
                 apikey: 'choisirgeoportail',
                 format: 'image/jpeg',
                 style: 'normal',
                 enableHighAccuracy: true
             }).addTo(mymap);
         mymap.addLayer(osmLayer);
         mymap.touchZoom.enable();
         mymap.scrollWheelZoom.disable();
         icon = L.icon({
             iconUrl: '/img/marker.png',
             iconSize: [20, 20],
             iconAnchor: [20, 20],
             popupAnchor: [0, -20]
         });

         if (navigator.geolocation) {
             navigator.geolocation.getCurrentPosition(function(position) {
                 mymap.setView([position.coords.latitude, position.coords.longitude], 17);
                 L.marker([position.coords.latitude, position.coords.longitude], {
                     icon: icon
                 }).addTo(mymap);
                 document.getElementById('latitude').value = position.coords.latitude.toFixed(6);
                 document.getElementById('longitude').value = position.coords.longitude.toFixed(6);
             });
         }

         mymap.on('click', function(e) {
             if (marker) {
                 mymap.removeLayer(marker);
             }
           //  marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
           //  document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
           //  document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
         });
     </script>
 @endsection
