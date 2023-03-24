 @php($type = request()->query('type'))
 @php($placeid = request()->query('id'))
 @extends('layouts.app')

 @section('main')
     <div data-barba="container">

         <div class="flex flex-col h-screen mx-auto">

             <div class="flex flex-row items-center pt-2">
                 <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
             </div>
             <form action="" method="POST" enctype="multipart/form-data">
                 @csrf
                 <div class="flex flex-col items-center justify-center">
                     <h1 class="pt-4 text-4xl font-bold text-center text-gray-900 mx-8">Let others know how comfortable the
                         space is!
                     </h1>
                     <div class="pb-8">
                         <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pt-4 pb-16">
                             <input name="change" id="change" class="hidden" type="input" x-model="total_value"/>
                             <div class="flex justify-between">
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">uncomfortable</label>
                                 <label for="default-range"
                                     class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very
                                     comfortable</label>
                             </div>
                                <div class="w-full flex justify-between text-xs px-2">
                                 <span>|</span>
                                 <span>|</span>
                                 <span>|</span>
                              
                             </div>
                             <input id="range"
                                 class="w-80 block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer range-lg "
                                 type="range" x-model="total_value" min="0" max="100" step="10">

                          
                         </div>
                     </div>
                     <div class="relative flex items-center justify-center h-64 w-64">
                         <button class="rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold">play, exercise, activities</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">place to rest</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="top: 25%; right: 0; transform: translate(50%, -50%)">walk, roll & <br>bike comfort</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="top: 75%; right: 0; transform: translate(50%, -50%)">visibility & orientation</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="bottom: 0; left: 50%; transform: translate(-50%, 50%)">rain & wind protection</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="top: 75%; left: 0; transform: translate(-50%, -50%)">facilities</button>
                         <button class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold" style="top: 25%; left: 0; transform: translate(-50%, -50%)">noise</button>
                     </div>
                     <button id="saveplace" type="submit"
                         class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-20">
                         Next challenge!
                     </button>
                 </div>
             </form>
         </div>
     </div>
     <script></script>
     <style>
         input[type="range"]::-webkit-slider-thumb {
             -webkit-appearance: none;
             appearance: none;
             background: #CDB8EB;
         }
     </style>
 @endsection
