 @php use \App\Http\Controllers\GlobalController; @endphp
 @php
     $opinions = GlobalController::allopinions();
    $thetype = session()->get('type');
    $theplaceid = session()->get('placeid');
 @endphp

 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="flex flex-col h-screen mx-auto">
              <div id="newtagadded" class="fixed top-5 right-5 p-2 border rounded bg-blue-500 text-white font-bold"></div>
             <div class="p-3">
                       <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="text-gray-800 text-sm mt-6 mr-4">Skip</button>
                 </div>
                 <div class="flex flex-col items-center justify-center">
                     <h1 class="pt-4 mx-8 text-xl font-bold text-center text-gray-900">
                         {{ __('messages.Add #opinions to describe the space and earn 1 point!') }}</h1>
                     <div class="w-48 pt-8">
                         @foreach ($opinions as $opinion)
                             <label>
                                 <input type="checkbox" name="form-project-manager[]" value="{{ $opinion->name }}"
                                     class="sr-only peer">
                                 <div
                                     class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                                     <div class="flex justify-center">
                                         <div class="font-semibold">{{ $opinion->name }}</div>
                                     </div>
                                 </div>
                             </label>
                         @endforeach
                         <input type="checkbox" id="personal" name="form-project-manager[]" value="" class="hidden peer">

                         <div x-data="{ modelOpen: false }">
                             <button id="point" @click="modelOpen =!modelOpen"
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white active:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                                 <div class="flex justify-center">
                                     <div class="font-semibold">{{ __('messages.Add a personal opinion') }}</div>
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
                                                 <h1 class="pb-4 text-2xl font-bold">{{ __('messages.Add a new opinion') }}
                                                 </h1>
                                                 <div>
                                                     <input type="text" name="opinionname" id="opinionname"
                                                         class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                         placeholder="Enter tag name">
                                                 </div>
                                                 <button id="newopinion" type="button"
                                                     class="px-4 text-2xl py-2 bg-[#CDB8EB] text-gray-800 hover:bg-purple-300 active:bg-purple-400 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <button id="saveopinion"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-4  mb-4">
                         {{ __('messages.Next challenge!') }}
                     </button>
                
                     <input type="hidden" id="thetype" value="{{ $thetype }}">
                     <input type="hidden" id="theplaceid" value="{{ $theplaceid }}">
     
                 </div>
             </div>
         </div>
     </div>
     <script>
         window.addEventListener("DOMContentLoaded", (event) => {



             $('#newopinion').click(function() {
                 name = document.getElementById('opinionname').value;
                 thedata = document.getElementById('theplaceid').value;
                 thetype = document.getElementById('thetype').value;
                 console.log(thedata);
            

                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                 $.ajax({
                     type: 'POST',
                     url: "/newopinion",
                     data: {
                         name: name,
                     },
                     success: function(data) {
                         var hiddertag = document.querySelector(".hiddertag");
                      hiddertag.click();
                       showMessage("Personal Opinion saved");
                       var personal = document.getElementById("personal");
                       personal.value = data;
                       personal.checked = true;
                     }
                 });
});
   

             $('#saveopinion').click(function() {
                 placeid = document.getElementById('theplaceid').value;
                 type = document.getElementById('thetype').value;
                 console.log(placeid);
                 console.log(type);

                 opinions = [];
                 var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                 for (var i = 0; i < checkboxes.length; i++) {
                     opinions.push(checkboxes[i].value);
                 }

                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                 thename = Math.random().toString(8).substring(7);



                 $.ajax({
                     type: 'POST',
                     url: "/opinions",
                     data: {
                         name: thename,
                         placeid: placeid,
                         opinions: opinions,
                         type: type,
                     },
                     success: function(data) {
                        console.log(data);
                         open("/step4?id=" + data, "_self");
                     }
                 });

             });
         });

          $('#skip').click(function() {
                 placeid = document.getElementById('theplaceid').value;
                 type = document.getElementById('thetype').value;
                 console.log(placeid);
                 console.log(type);

                 opinions = [""];
                
                 $.ajaxSetup({
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                 thename = Math.random().toString(8).substring(7);

                 $.ajax({
                     type: 'POST',
                     url: "/opinions",
                     data: {
                         name: thename,
                         placeid: placeid,
                         opinions: opinions,
                         type: type,
                     },
                     success: function(data) {
                        console.log(data);
                         open("/step4?id=" + data, "_self");
                     }
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
         #message {
             display: none;
         }

                #newtagadded {
             display: none;
         }
     </style>
 @endsection
