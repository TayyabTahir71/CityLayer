 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         @include('parts.navbar')
         <div class="flex flex-col h-screen mx-auto">
             <div class="p-3 pt-16 lg:mx-16 md:pt-20">
                 <div class="flex flex-row items-center pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-arrow-left"></i></a>
                 </div>
                 <div class="flex flex-col justify-center items-center">
                     <button class="w-32 h-32 mx-4 text-gray-100 bg-[#55C5CF] focus:outline-none rounded-full" disabled>
                          <i class="fa-solid fa-street-view"></i><br>openspace
                     </button>
                     <h1 class="pt-2 text-xl font-bold text-gray-900 text-center">Add #tags to describe the space and earn
                         points!</h1>
                     <div class="w-48 pt-4">
                      @foreach ($tags as $tag)
                           <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">{{ $tag->name }}</div>
                                 </div>
                             </div>
                         </label>
                      @endforeach

                            <div x-data="{ modelOpen: false }">
                             <button id="point" @click="modelOpen =!modelOpen"
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white active:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                 <div class="flex justify-center">
                                     <div class="font-semibold">Add a new tag</div>
                                 </div>
                             </button>

                             <div x-cloak x-show="modelOpen" class="fixed inset-0 overflow-y-auto z-50"
                                 aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                 <div
                                     class="flex justify-center min-h-screen px-4 text-center items-center sm:block sm:p-0">
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

                                         <div class="items-center space-x-4 bloc pt-3">
                                             <div class="flex flex-col justify-center">
                                                 <h1 class="text-2xl pb-4 font-bold">Add a new tag</h1>
                                                 <div>
                                                     <input type="text" name="tagname" id="tagname"
                                                         class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#55C5CF] focus:border-transparent"
                                                         placeholder="Enter tag name">
                                                 </div>
                                                 <button onclick="newTag()"
                                                     class="px-4 text-2xl py-2 bg-[#55C5CF] text-gray-800 hover:bg-blue-300 active:bg-blue-400 focus:outline-none font-bold mt-4">Save</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
           
                 </div>
            <button type="submit"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#55C5CF] hover:bg-blue-300 active:bg-blue-400 border focus:outline-none rounded-xl font-bold mt-4">
                         Next challenge!
                     </button>

             </div>
         </div>
         <script>
             if (navigator.geolocation) {
                 navigator.geolocation.getCurrentPosition(function(position) {

                     document.getElementById('latitude').value = position.coords.latitude.toFixed(6);
                     document.getElementById('longitude').value = position.coords.longitude.toFixed(6);
                 });
             }

             
 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function newTag() {
              name = document.getElementById('tagname').value;
        
            $.ajax({
                type: 'POST',
                url: "/newtag",
                data: {
                    name: name,
                    category: "Openspace"
                },
                success: function(data) {
                   // refresh the webpage
                     location.reload();
                }
            });
    
        }
         </script>
     @endsection
