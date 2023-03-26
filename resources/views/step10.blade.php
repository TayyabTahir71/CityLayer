 @php use \App\Http\Controllers\GlobalController; @endphp
 @php
     $spacetags = GlobalController::allspacetag();
 @endphp

 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="flex flex-col h-screen mx-auto">
             <div class="p-3">
                 <div class="flex flex-row items-center pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
                 </div>
                  <input type="hidden" name="type" id="type" value="{{ $type }}">
                 <input type="hidden" name="placeid" id="placeid" value="{{ $placeid }}">
                 <div class="flex flex-col items-center justify-center">
                     <h1 class="pt-2 mx-8 text-xl font-bold text-center text-gray-900">Who uses the space the most? Add #tags!</h1>
                     <div class="w-48 pt-8">
                         @foreach ($spacetags as $spacetag)
                             <label>
                                 <input type="checkbox" name="form-project-manager[]" value="{{ $spacetag->name }}"
                                     class="sr-only peer">
                                 <div
                                     class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#FAC710]  bg-yellow-200 peer-focus:ring-2">

                                     <div class="flex justify-center">
                                         <div class="font-semibold">{{ $spacetag->name }}</div>
                                     </div>
                                 </div>
                             </label>
                         @endforeach

                         <div x-data="{ modelOpen: false }">
                             <button id="point" @click="modelOpen =!modelOpen"
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white active:bg-[#FAC710]  bg-yellow-200 peer-focus:ring-2">
                                 <div class="flex justify-center">
                                     <div class="font-semibold">Add a new tag</div>
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
                                         class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
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
                                                 <h1 class="pb-4 text-2xl font-bold">Add a new tag</h1>
                                                 <div>
                                                     <input type="text" name="spacetagname" id="spacetagname"
                                                         class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#FAC710] focus:border-transparent"
                                                         placeholder="Enter tag name">
                                                 </div>
                                                 <button id="newspacetag"
                                                     class="px-4 text-2xl py-2 bg-[#FAC710] text-gray-800 hover:bg-yellow-300 active:bg-yellow-400 focus:outline-none font-bold mt-4">Save</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <button id="savespacetags"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#FAC710] hover:bg-yellow-300 active:bg-yellow-400 border focus:outline-none rounded-xl font-bold mt-4">
                         Done!
                     </button>
                 </div>
             </div>
         </div>
     </div>
                 
     <script>
         window.addEventListener("DOMContentLoaded", (event) => {

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });

             $('#newspacetag').click(function() {
                 name = document.getElementById('spacetagname').value;

                 $.ajax({
                     type: 'POST',
                     url: "/newspacetag",
                     data: {
                         name: name,
                     },
                     success: function(data) {
                         // refresh the webpage
                         location.reload();
                     }
                 });

             });

             $('#savespacetags').click(function() {

            const placeid = document.getElementById('placeid').value;
            const type = document.getElementById('type').value;
            console.log(placeid);
            console.log(type);

                 spacetag = [];
                 var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                 for (var i = 0; i < checkboxes.length; i++) {
                     spacetag.push(checkboxes[i].value);
                 }
           

                 thename = Math.random().toString(8).substring(7);
                 $.ajax({
                     type: 'POST',
                     url: "/spaceusagedetail",
                     data: {
                         placeid: placeid,
                         spacetag: spacetag,
                         type: type,
                     },
                     success: function(data) {
                        open("/");
                     }
                 });

             });
         });
     </script>
 @endsection
