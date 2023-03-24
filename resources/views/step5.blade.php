 @php($type = request()->query('type'))
 @php($placeid = request()->query('id'))
 @extends('layouts.app')

 @section('main')
     <div data-barba="container">

         <div class="flex flex-col h-screen mx-auto">

             <div class="flex flex-row items-center pt-2">
                 <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
             </div>
             {{-- <form action="" method="POST" enctype="multipart/form-data">
                 @csrf --}}
             <div class="flex flex-col items-center justify-center">
                 <h1 class="pt-4 text-4xl font-bold text-center text-gray-900 mx-8">Let others know how comfortable the
                     space is!
                 </h1>
                 <div class="pb-8">
                     <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pt-4 pb-16">
                         <input name="change" id="change" class="hidden" type="input" x-model="total_value" />
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
                             type="range" x-model="total_value" min="0" max="100" step="5">


                     </div>
                 </div>
                 <div class="relative flex items-center justify-center h-64 w-64">

                     {{-- play exercices --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold">play, exercise,
                             activities</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                 <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                     class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                                 </div>

                                 <div x-cloak x-show="modelOpen"
                                     x-transition:enter="transition ease-out duration-300 transform"
                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="transition ease-in duration-200 transform"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Play, exercise, activities</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                                         activities!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many
                                                         great,<br> activities!</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <button type="text" name="tagname" id="tagname"
                                                     class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent">
                                                     Show us!</button>
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- place to rest --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">place to rest</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Place to rest</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                                         benches<br> or other!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great
                                                         places<br> to rest!</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <input type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                     placeholder="Tell us more!">
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- walk roll --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="top: 25%; right: 0; transform: translate(50%, -50%)">walk, roll & <br>bike
                             comfort</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Walk, roll, bike comfort</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">difficult<br> movement</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">simple, intuitive<br> movement</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <input type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                     placeholder="Tell us more!">
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- visibility --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="top: 75%; right: 0; transform: translate(50%, -50%)">visibility & orientation</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">visibility & orientation</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor, difficult!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great, intuitive!</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <input type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                     placeholder="Tell us more!">
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- rain --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="bottom: 0; left: 50%; transform: translate(-50%, 50%)">rain & wind protection</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Rain & wind protection</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <input type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                     placeholder="Describe!">
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- facilities --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="top: 75%; left: 0; transform: translate(-50%, -50%)">facilities</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Facilities</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none / poor<br>facilities!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many / great<br> facilities!</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <input type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                     placeholder="Tell us more!">
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- noise --}}
                     <div x-data="{ modelOpen: false }">
                         <button id="play" @click="modelOpen =!modelOpen"
                             class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                             style="top: 25%; left: 0; transform: translate(-50%, -50%)">noise</button>

                         <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                             aria-labelledby="modal-title" role="dialog" aria-modal="true">
                             <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
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
                                     class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                     <div class="items-center pt-3 space-x-4 bloc">
                                         <div class="flex flex-col justify-center">
                                             <h1 class="py-4 text-3xl font-bold">Noise</h1>
                                             <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                 <input name="activities" id="activities" class="hidden" type="input"
                                                     x-model="total_value" />

                                                 <input id="range2"
                                                     class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                     type="range" x-model="total_value" min="0" max="100"
                                                     step="5">
                                                 <div class="w-full flex justify-between text-xs px-2">
                                                     <span>|</span>
                                                     <span>|</span>
                                                     <span>|</span>
                                                 </div>
                                                 <div class="flex justify-between">
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">quiet and<br> comfortable!</label>
                                                     <label for="default-range"
                                                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">loud and<br> iritating!</label>
                                                 </div>

                                             </div>
                                             <div>
                                                 <button type="text" name="tagname" id="tagname"
                                                     class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent">Record!</button>
                                             </div>
                                             <button id="newtag"
                                                 class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
                 <button id="saveplace" type="submit"
                     class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-20">
                     Next challenge!
                 </button>
             </div>
             {{-- </form> --}}
         </div>
     </div>
     <script></script>
     <style>
         input[type="range"]::-webkit-slider-thumb {
             -webkit-appearance: none;
             appearance: none;
             background: #CDB8EB;
         }

         #range2::-webkit-slider-thumb {
             -webkit-appearance: none;
             appearance: none;
             background: black;
         }
     </style>
 @endsection
