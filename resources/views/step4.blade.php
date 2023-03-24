 @php($type = request()->query('type'))
 @php($placeid = request()->query('id'))
 @extends('layouts.app')

 @section('main')
     <div data-barba="container">

         <div class="flex flex-col h-screen mx-auto">

             <div class="flex flex-row items-center pt-2">
                 <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
             </div>
             <form action="upload-image" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="flex flex-col items-center justify-center">
                     <h1 class="pt-16 text-4xl font-bold text-center text-gray-900 mx-8">Would you change something in this
                         space?
                     </h1>
                     <div class="pt-4">
                         <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pt-16 pb-16">
                             <input name="change" id="change" class="hidden" type="input" x-model="total_value" />
                             <div class="flex justify-between">
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nothing at
                                     all</label>
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many
                                     things</label>
                             </div>
                                  <div class="w-full flex justify-between text-xs px-2">
                                 <span>|</span>
                                 <span>|</span>
                                 <span>|</span>
                             </div>
                             <input id="range"
                                 class="w-80 block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer range-lg"
                                 type="range" x-model="total_value" min="0" max="100" step="5">

                        
                         </div>
                     </div>
                     <div class="flex flex-col py-8 space-y-6 bg-[#CDB8EB] w-full">

                         <div class="flex justify-center">
                             <label for="inputImage" class="button">
                                 <h1 class="px-4 py-8 text-3xl font-bold text-center bg-white rounded-xl">
                                     Share a photo!
                                 </h1>
                             </label>
                             <input type="file" name="image" id="inputImage" class="hidden" accept="image/*;capture=camera">
                         </div>
                         <input type="hidden" name="type" value="{{ $type }}">
                         <input type="hidden" name="placeid" value="{{ $placeid }}">
                     </div>
                     <button id="saveplace" type="submit"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-16">
                         Next challenge!
                     </button>
                 </div>
             </form>
         </div>
     </div>
     <script>
       
     </script>
     <style>
         input[type="range"]::-webkit-slider-thumb {
             -webkit-appearance: none;
             appearance: none;
             background: #CDB8EB;
         }
     </style>
 @endsection
