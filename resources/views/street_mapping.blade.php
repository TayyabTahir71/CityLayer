 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="flex flex-col h-screen mx-auto">
                       <div id="newtagadded" class="fixed p-2 font-bold text-white bg-blue-500 border rounded top-5 right-5"></div>
             <div class="p-3">
                <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="mt-6 mr-4 text-sm text-gray-800">Skip</button>
                 </div>
                 <div class="flex flex-col items-center justify-center">
                     <button class="w-32 h-32 mx-4 text-gray-100 bg-[#55C5CF] focus:outline-none rounded-full" disabled>
                         <i class="fa-solid fa-road"></i><br>Street
                     </button>
                     <h1 class="pt-2 text-xl font-bold text-center text-gray-900">
                         {{ __('messages.Add #tags to describe the space and earn 1 point!') }}</h1>
                     <div class="w-48 pt-4">
                         @php $locale = session()->get('locale'); @endphp
                         @if ($locale == 'de')
                             @foreach ($tags_de as $tag)
                                 <label>
                                     <input type="checkbox" name="form-project-manager[]" value="{{ $tag->name }}"
                                         class="sr-only peer">
                                     <div
                                         class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">

                                         <div class="flex justify-center">
                                             <div class="text-xs font-semibold">{{ $tag->name }}</div>
                                         </div>
                                     </div>
                                 </label>
                             @endforeach
                         @else
                             @foreach ($tags as $tag)
                                 <label>
                                     <input type="checkbox" name="form-project-manager[]" value="{{ $tag->name }}"
                                         class="sr-only peer">
                                     <div
                                         class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">

                                         <div class="flex justify-center">
                                             <div class="text-xs font-semibold">{{ $tag->name }}</div>
                                         </div>
                                     </div>
                                 </label>
                             @endforeach
                         @endif
                          <label id="perso" class="hidden">
                          <input type="checkbox" id="personal" name="form-project-manager[]" value="" class="hidden sr-only peer">
                                  <div
                                         class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">

                                         <div class="flex justify-center">
                                             <div id="personame" class="font-semibold"></div>
                                         </div>
                                     </div>
                                 </label>
             
                         <div x-data="{ modelOpen: false }">
                             <button id="point" @click="modelOpen =!modelOpen"
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white active:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                 <div class="flex justify-center">
                                     <div class="font-semibold">{{ __('messages.Add a personal tag') }}</div>
                                 </div>
                             </button>

                             <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                 aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                 <div
                                     class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                     <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                         x-transition:enter="transition ease-out duration-300 transform"
                                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                         x-transition:leave="transition ease-in duration-200 transform"
                                         x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                         class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 hiddertag"
                                         aria-hidden="true">
                                     </div>

                                     <div x-cloak x-show="modelOpen"
                                         x-transition:enter="transition ease-out duration-300 transform"
                                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave="transition ease-in duration-200 transform"
                                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                         class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl z-60 lg:mt-60">

                                         <div class="items-center pt-3 space-x-4 bloc">
                                             <div class="flex flex-col justify-center">
                                                 <h1 class="pb-4 text-2xl font-bold">{{ __('messages.Add a new tag') }}</h1>
                                                 <div>
                                                     <input type="text" name="tagname" id="tagname"
                                                         class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#55C5CF] focus:border-transparent"
                                                         placeholder="Enter tag name">
                                                 </div>
                                                 <button id="newtag" type="button"
                                                     class="px-4 text-2xl py-2 bg-[#55C5CF] text-gray-800 hover:bg-blue-300 active:bg-blue-400 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <input class="hidden" type="text" name="latitude" id="latitude" value="">
                         <input class="hidden" type="text" name="longitude" id="longitude" value="">
                     </div>
                     <button id="saveplace"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#55C5CF] hover:bg-blue-300 active:bg-blue-400 border focus:outline-none rounded-xl font-bold mt-4">
                         {{ __('messages.Next challenge!') }}
                     </button>
                 </div>
             </div>
         </div>
     </div>
     <script>
         window.addEventListener("DOMContentLoaded", (event) => {


             if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(function() {}, function() {}, {});
                 navigator.geolocation.getCurrentPosition(function(position) {

                         document.getElementById('latitude').value = position.coords.latitude.toFixed(6);
                         document.getElementById('longitude').value = position.coords.longitude.toFixed(6);
                     },
                     function(e) {}, {
                         enableHighAccuracy: true,
                           maximumAge: 10000,
                           timeout: 5000
                     });
             }


             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $('#newtag').click(function() {
                 name = document.getElementById('tagname').value;

                 $.ajax({
                     type: 'POST',
                     url: "/newtag",
                     data: {
                         name: name,
                         category: "Street"
                     },
                     success: function(data) {
                         // refresh the webpage
                       var hiddertag = document.querySelector(".hiddertag");
                      hiddertag.click();
                    var newtag = document.getElementById("personal");
                    newtag.value = data;
                    newtag.checked = true;
                    newtag.classList.remove("hidden");
                    
                       showMessage("Personal Tag saved");
                       var perso = document.getElementById("perso");
                        perso.classList.remove("hidden");
                        var personame = document.getElementById("personame");
                        personame.innerHTML = name;
                     }
                 });

             });

             $('#saveplace').click(function() {
                 tags = [];
                 var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                 for (var i = 0; i < checkboxes.length; i++) {
                     tags.push(checkboxes[i].value);
                 }
                 latitude = document.getElementById('latitude').value;
                 longitude = document.getElementById('longitude').value;
                 //generate a random string name
                 thename = Math.random().toString(8).substring(7);
                 $.ajax({
                     type: 'POST',
                     url: "/new_place",
                     data: {
                         name: thename,
                         type: "Street",
                         latitude: latitude,
                         longitude: longitude,
                         tags: tags
                     },
                     success: function(data) {
                         open("/step2?id=" + data, "_self");
                     }
                 });

             });

          $('#skip').click(function() {
          
                 latitude = document.getElementById('latitude').value;
                 longitude = document.getElementById('longitude').value;
                 thename = Math.random().toString(8).substring(7);
                 $.ajax({
                     type: 'POST',
                     url: "/new_place",
                     data: {
                         name: thename,
                         type: "Street",
                         latitude: latitude,
                         longitude: longitude,
                         tags: [""]
                     },
                     success: function(data) {
                         open("/step2?id=" + data, "_self");
                     }
                 });

             });
         });


          function showMessage(message) {
             var messageBox = document.getElementById("newtagadded");
             messageBox.innerHTML = message;
             messageBox.style.display = "block"; // set display to block to show the message
             setTimeout(function() {
                 messageBox.style.display = "none"; // hide the message after 3 seconds
             }, 2000);
         }
     </script>
     <style>
       #newtagadded {
             display: none;
         }
    </style>
 @endsection
