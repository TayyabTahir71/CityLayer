@extends('layouts.app')

@section('main')
    <div data-barba="container">

        <div class="flex flex-col h-screen mx-auto">
  <div id="message" class="fixed top-5 right-5 p-2 border rounded bg-green-500 text-white font-bold"></div>
               <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="text-gray-800 text-sm mt-6 mr-4">Skip</button>
                 </div>
            <form action="confortlevel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <h1 class="text-3xl font-bold text-center text-gray-900 mx-8">{{ __('messages.Let others know how comfortable the space is!') }}
                    </h1>
                    <div class="pb-8">
                        <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pt-4 pb-16">
                            <input name="level" id="level" class="hidden" type="input" x-model="total_value" />
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.uncomfortable') }}</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very comfortable') }}</label>
                            </div>
                                      <div class="flex justify-between w-full px-2 text-xs pb-2">
                                  <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                            <input id="range"
                                class="w-80 block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer range-lg "
                                type="range" x-model="total_value" min="0" max="100" step="5">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="hidden" name="placeid" id="placeid" value="{{ $placeid }}">

                        </div>
                    </div>
                    <div class="relative flex items-center justify-center h-64 w-64">

                        {{-- play exercices --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold">{{ __('messages.play, exercise, activities') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass"
                                        aria-hidden="true">
                                    </div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="mymodal inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#CDB8EB] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.play, exercise, activities') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="activities" id="activities" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0" max="100"
                                                        step="5">
                                                              <div class="flex justify-between w-full px-2 text-xs py-2">
                                 <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.no activities!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.many great') }}<br> {{ __('messages.activities!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="activities_text" id="activities_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="activitiesbtn" onclick="newAction('activities')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- place to rest --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">{{ __('messages.place to rest') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass1"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.place to rest') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="rest" id="rest" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                 <div class="flex justify-between w-full px-2 text-xs py-2">
                                 <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.no benches') }}<br> {{ __('messages.or other!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great places') }}<br> {{ __('messages.to rest!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="rest_text" id="rest_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="restbtn" onclick="newAction('rest')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- walk roll --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 25%; right: 5%; transform: translate(50%, -50%)">{{ __('messages.walk, roll & ') }}<br>{{ __('messages.bike comfort') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass2"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.Walk, roll, bike comfort') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="movement" id="movement" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                  <div class="flex justify-between w-full px-2 text-xs py-2">
                                  <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.difficult') }}<br>{{ __('messages.movement') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.simple, intuitive') }}<br>{{ __('messages.movement') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="movement_text" id="movement_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="movementbtn" onclick="newAction('movement')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- visibility --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 75%; right: 5%; transform: translate(50%, -50%)">{{ __('messages.visibility & orientation') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass3"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.visibility & orientation') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="orientation" id="orientation" class="hidden"
                                                        type="input" x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                 <div class="flex justify-between w-full px-2 text-xs py-2">
                                  <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.poor, difficult!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great, intuitive!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="orientation_text" id="orientation_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="orientationbtn"
                                                    onclick="newAction('orientation')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- rain --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="bottom: 0; left: 50%; transform: translate(-50%, 50%)">{{ __('messages.rain & wind protection') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass4"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.rain & wind protection') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="weather" id="weather" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                <div class="flex justify-between w-full px-2 text-xs py-2">
                                 <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.poor!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="weather_text" id="weather_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="weatherbtn" onclick="newAction('weather')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- facilities --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 75%; left: 5%; transform: translate(-50%, -50%)">{{ __('messages.facilities') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass5"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.facilities') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="facilities" id="facilities" class="hidden"
                                                        type="input" x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                   <div class="flex justify-between w-full px-2 text-xs py-2">
                                 <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.none , poor') }}<br>{{ __('messages.facilities!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.many , great') }}<br>{{ __('messages.facilities!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="facilities_text" id="facilities_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="facilitiesbtn"
                                                    onclick="newAction('facilities')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- noise --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold"
                                style="top: 25%; left: 5%; transform: translate(-50%, -50%)">{{ __('messages.noise') }}</button>

                            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div
                                    class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40 myclass6"
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
                                                <h1 class="py-4 text-3xl font-bold capitalize">{{ __('messages.noise') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="noise" id="noise" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                                   <div class="flex justify-between w-full px-2 text-xs py-2">
                        <span>0</span>
                                 <span>1</span>
                                 <span>2</span>
                                   <span>3</span>
                                     <span>4</span>
                                       <span>5</span>
                                            <span>6</span>
                                            <span>7</span>
                                                <span>8</span>
                                                <span>9</span>
                                                    <span>10</span>
                             </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.quiet and') }}<br>{{ __('messages.comfortable!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.loud and') }}<br>{{ __('messages.iritating!') }}</label>
                                                    </div>

                                                </div>
                                                         <div>
                                                    <input type="text" name="noise_text" id="noise_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                               
                                                <button type="button" id="noisebtn" onclick="newAction('noise')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button id="saveplace" type="submit"
                        class="px-4 text-2xl py-2 text-gray-800 bg-[#CDB8EB] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-20  mb-4">
                        {{ __('messages.Next challenge!') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        placeid = document.getElementById('placeid').value;
        type = document.getElementById('type').value;

        function newAction(action) {
            console.log(action);
            url = "/enjoy"
            var thisaction;
            switch (action) {
                case 'activities':
                    thisaction = "activities";
                    thisvalue = document.getElementById('activities').value;
                    thistext = document.getElementById('activities_text').value;
                    break;
                case 'rest':
                    thisaction = "rest";
                    thisvalue = document.getElementById('rest').value;
                    thistext = document.getElementById('rest_text').value;
                    break;
                case 'movement':
                    thisaction = "movement";
                    thisvalue = document.getElementById('movement').value;
                    thistext = document.getElementById('movement_text').value;
                    break;
                case 'orientation':
                    thisaction = "orientation";
                    thisvalue = document.getElementById('orientation').value;
                    thistext = document.getElementById('orientation_text').value;
                    break;
                case 'weather':
                    thisaction = "weather";
                    thisvalue = document.getElementById('weather').value;
                    thistext = document.getElementById('weather_text').value;
                    break;
                case 'facilities':
                    thisaction = "facilities";
                    thisvalue = document.getElementById('facilities').value;
                    thistext = document.getElementById('facilities_text').value;
                    break;
                case 'noise':
                    thisaction = "noise";
                    thisvalue = document.getElementById('noise').value;
                    thistext = document.getElementById('noise_text').value;
                    break;
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    placeid: placeid,
                    type: type,
                    value: thisvalue,
                    action: thisaction,
                    text: thistext
                },


                success: function(data) {
                var myElement = document.querySelector(".myclass");
                var myElement1 = document.querySelector(".myclass1");
                var myElement2 = document.querySelector(".myclass2");
                var myElement3 = document.querySelector(".myclass3");
                var myElement4 = document.querySelector(".myclass4");
                var myElement5 = document.querySelector(".myclass5");
                var myElement6 = document.querySelector(".myclass6");
showMessage("New points");

                myElement.click();
                myElement1.click();
                myElement2.click();
                myElement3.click();
                myElement4.click();
                myElement5.click();
                myElement6.click();
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

 $('#skip').click(function() {
          var btn = document.getElementById("saveplace");
          btn.click();
         });

    </script>
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

         #message {
             display: none;
         }
    </style>
@endsection
