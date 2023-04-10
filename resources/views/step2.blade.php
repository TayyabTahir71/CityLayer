 @php($type = request()->query('type'))
 @php($placeid = request()->query('id'))
 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="flex flex-col mx-auto">
             <div id="map" class="h-[65vh] lg:h-[70vh] w-auto z-0"></div>
             <div id="message" class="fixed p-2 font-bold text-white bg-green-500 border rounded top-5 right-5"></div>
             <div class="fixed bottom-0 w-screen overflow-y-auto">
                 <div class="flex items-end justify-center text-center">
                     <div
                         class="flex justify-center w-screen p-8 overflow-hidden text-left transition-all transform bg-[#CDB8EB] shadow-xl z-50">
                         <div id="myfeel" class="items-center max-w-2xl space-x-4">
                             <h1 class="text-2xl font-bold text-center text-black">{{ __('messages.How do you feel in this space?') }}</h1>
                             <div class="flex flex-col pt-4 space-y-6">
                                 <div class="flex justify-between w-full">
                                     <button class="" onclick="feel('happy')">
                                         <img src="/img/happy.png" alt="happy" class="w-16 h-16 mb-2">
                                         <h1 class="font-bold ">{{ __('messages.happy') }}</h1>
                                     </button>
                                     <button class="" onclick="feel('sad')">
                                         <img src="/img/sad.png" alt="sad" class="w-16 h-16 mb-2">
                                         <h1 class="font-bold ">{{ __('messages.sad') }}</h1>
                                     </button>
                                     <button class="" onclick="feel('stressed')">
                                         <img src="/img/stressed.png" alt="stressed" class="w-16 h-16 mb-2">
                                         <h1 class="font-bold ">{{ __('messages.stressed') }}</h1>
                                     </button>

                                 </div>
                                 <div class="flex justify-between w-full">
                                     <button class="" onclick="feel('angry')">
                                         <img src="/img/angry.png" alt="angry" class="w-16 h-16 mb-2">
                                         <h1 class="font-bold ">{{ __('messages.angry') }}</h1>
                                     </button>
                                     <button class="" onclick="feel('worried')">
                                         <img src="/img/worried.png" alt="worried" class="w-16 h-16 mb-2">
                                         <h1 class="font-bold ">{{ __('messages.worried') }}</h1>
                                     </button>
                                     <button class="mr-2" onclick="feel('other')">
                                         <h1 class="pt-4 font-bold">{{ __('messages.other') }}</h1>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="main-modal">
                 <div class="modal-container">
                     <div class="modal-content">
                         <div class="fixed bottom-0 w-screen overflow-y-auto">
                             <div
                                 class="flex justify-center w-screen p-8 overflow-hidden text-left transition-all transform bg-[#CDB8EB] shadow-xl z-50">
                                 <div class="items-center max-w-2xl space-x-4">
                                     <h1 class="pb-8 text-3xl text-center text-black">{{ __('messages.Share what makes you feel that way!') }}
                                     </h1>
                                     <div class="flex flex-col pt-4 space-y-6">
                                         <div class="flex justify-center w-full">
                                             <button class="" onclick="document.getElementById('modalform').click()">
                                                 <h1 class="px-4 py-8 text-3xl font-bold text-center bg-white rounded-xl">
                                                     {{ __('messages.Describe and share a photo!') }}</h1>
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
         <div x-data="{ modelOpen: false }">
             <button id="modalform" @click="modelOpen =!modelOpen" class="hidden">
             </button>


             <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                 role="dialog" aria-modal="true">
                 <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                         class="z-50 inline-block w-full max-w-xl p-8 overflow-hidden transition-all transform">

                         <div class="w-full">
                             <div class="flex flex-col p-4 mt-4 font-bold bg-[#CDB8EB] shadow rounded-lg mynav">
                                 <form action="/upload-image0" method="post" enctype="multipart/form-data">
                                     @csrf
                                     <div class="flex flex-col space-y-4">
                                         <div class="flex flex-col space-y-2">
                                             <label for="description" class="text-sm font-bold text-gray-700">{{ __('messages.Describe what makes you feel that way!') }}</label>
                                             <textarea name="description" id="description" cols="10" rows="10"
                                                 class="w-full px-4 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-purple-300"
                                                 placeholder=""></textarea>
                                         </div>
                                         <div class="flex flex-col space-y-2">
                                             <input type="file" name="imagefirst" id="imagefirst" class="hidden"
                                                 accept="image/*;capture=camera">
                                             <label for="imagefirst" class="cursor-pointer">
                                                 <div
                                                     class="w-full px-4 py-4 font-bold text-black bg-white rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline">
                                                    {{ __('messages.Upload a photo') }}</div>
                                             </label>
                                             <div id="success-message" class="hidden font-bold text-green-500">{{ __('messages.File selected successfully!') }}</div>
                                         </div>
                                         <button type="submit"
                                             class="w-full px-4 py-4 font-bold text-black bg-white rounded-lg hover:bg-gray-200 focus:outline-none focus:shadow-outline">{{ __('messages.Save') }}</button>
                                         <input type="hidden" name="type" value="{{ $type }}">
                                         <input type="hidden" name="placeid" value="{{ $placeid }}">
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <script>
         const fileInput = document.getElementById('imagefirst');
         const successMessage = document.getElementById('success-message');

         fileInput.addEventListener('change', () => {
             successMessage.classList.remove('hidden');
         });
         feeling = "";


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
                     mymap0.setView([position.coords.latitude, position.coords.longitude], 19);
                     L.marker([position.coords.latitude, position.coords.longitude], {
                         icon: icon
                     }).addTo(mymap0);
                 },
                 function(e) {}, {
                     enableHighAccuracy: true
                 });
         }


        function mylocation() {
             navigator.geolocation.getCurrentPosition(function(position) {
            mymap0.flyTo([position.coords.latitude, position.coords.longitude], 19);
             });
        }


         function feel(action) {
             feeling = action;
             openModal('main-modal');
             showMessage("New points");
             document.getElementById("myfeel").style.display = "none";

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
             //get url
             const url = new URL(window.location.href);
             // get the query parameters as an instance of URLSearchParams
             const searchParams = url.searchParams;

             // get the values of the "id" and "type" parameters
             const id = searchParams.get("id");
             const type = searchParams.get("type");

             $.ajax({
                 type: 'POST',
                 url: "/feeling",
                 data: {
                     id: id,
                     type: type,
                     feeling: feeling,
                 },
                 success: function(data) {
                     // open("/step3?id=" + data + "&type=" + type, "_self");

                 }
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



         all_modals = ['main-modal']
         all_modals.forEach((modal) => {
             const modalSelected = document.querySelector('.' + modal);
             modalSelected.classList.remove('fadeIn');
             modalSelected.classList.add('fadeOut');
             modalSelected.style.display = 'none';
         })
         const modalClose = (modal) => {
             const modalToClose = document.querySelector('.' + modal);
             modalToClose.classList.remove('fadeIn');
             modalToClose.classList.add('fadeOut');
             setTimeout(() => {
                 modalToClose.style.display = 'none';
             }, 500);
         }

         const openModal = (modal) => {
             const modalToOpen = document.querySelector('.' + modal);
             modalToOpen.classList.remove('fadeOut');
             modalToOpen.classList.add('fadeIn');
             modalToOpen.style.display = 'flex';
         }
     </script>
     <style>
         #message {
             display: none;
         }
     </style>
 @endsection
