 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         @include('parts.navbar')
         <div class="flex flex-col h-screen mx-auto">
             <div class="z-0 p-3 pt-16 lg:mx-16 md:pt-20">
                 <div class="flex flex-row items-center pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-arrow-left"></i></a>
                 </div>
                 <div class="flex flex-col justify-center items-center">
                     <button class="w-32 h-32 mx-4 text-gray-100 bg-[#55C5CF] focus:outline-none rounded-full" disabled>
                         <i class="fa-solid fa-road"></i><br>street
                     </button>
                     <h1 class="pt-2 text-xl font-bold text-gray-900 text-center">Add #tags to describe the space and earn
                         points!</h1>
                     <div class="w-48 pt-4">
                         <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">sidewalk</div>
                                 </div>
                             </div>
                         </label>
                        <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">path</div>
                                 </div>
                             </div>
                         </label>
                         <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">walking street</div>
                                 </div>
                             </div>
                         </label>
                         <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">road</div>
                                 </div>
                             </div>
                         </label>
                         <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">intersection</div>
                                 </div>
                             </div>
                         </label>
                         <label>
                             <input type="checkbox" name="form-project-manager[]" value="1" class="peer sr-only">
                             <div
                                 class="group mb-3 flex items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#55C5CF]  bg-blue-50 peer-focus:ring-2">
                                
                                 <div class="flex justify-center">
                                         <div class="font-semibold">passage</div>
                                 </div>
                             </div>
                         </label>
                     </div>
                     <button class="px-4 text-2xl py-2 text-gray-800 border focus:outline-none rounded-xl font-bold mt-4">
                        Next challenge!
                        </button>
                 </div>


             </div>
         </div>
         <script>
             if (navigator.geolocation) {
                 navigator.geolocation.getCurrentPosition(function(position) {

                     document.getElementById('latitude').value = position.coords.latitude.toFixed(6);
                     document.getElementById('longitude').value = position.coords.longitude.toFixed(6);
                 });
             }
         </script>
     @endsection
