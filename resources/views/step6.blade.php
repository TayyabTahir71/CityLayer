@extends('layouts.app')

@section('main')
    <div data-barba="container">

        <div class="flex flex-col h-screen mx-auto">

            <div class="flex flex-row items-center pt-2">
                <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
            </div>
            <form action="enjoyable" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <h1 class="pt-4 text-4xl font-bold text-center text-gray-900 mx-8">Let others know how enjoyable the space is!
                    </h1>
                    <div class="pb-8">
                        <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pt-4 pb-16">
                            <input name="level" id="level" class="hidden" type="input" x-model="total_value" />
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">unpleasant</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very pleasant</label>
                            </div>
                            <div class="w-full flex justify-between text-xs px-2">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>

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
                                class="rounded-full bg-[#CDB8EB] w-28 h-28 text-white font-bold">talking & listening</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Talking & listening</h1>
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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very difficult</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">simple & effortless</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <p type="text" name="activities_text" id="activities_text"
                                                        class="w-48 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent mx-auto">
                                                        Show us!</p>
                                                </div>
                                                <button type="button" id="activitiesbtn" onclick="newAction('activities')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">seasonality</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Seasonality</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="rest" id="rest" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor in some seasons</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great year round</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="rest_text" id="rest_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="restbtn" onclick="newAction('rest')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="top: 25%; right: 0; transform: translate(50%, -50%)">plants & trees</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Plants & trees</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="movement" id="movement" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="movement_text" id="movement_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="movementbtn" onclick="newAction('movement')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="top: 75%; right: 0; transform: translate(50%, -50%)">sunlight</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Sunlight</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="orientation" id="orientation" class="hidden"
                                                        type="input" x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no direct sunlight</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">a lot of sunlight</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="orientation_text" id="orientation_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="orientationbtn"
                                                    onclick="newAction('orientation')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="bottom: 0; left: 50%; transform: translate(-50%, 50%)">shade</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Shade</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="weather" id="weather" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">plenty shade</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="weather_text" id="weather_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Describe!">
                                                </div>
                                                <button type="button" id="weatherbtn" onclick="newAction('weather')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="top: 75%; left: 0; transform: translate(-50%, -50%)">interesting<br>sights</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Interesting<br>sights</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="facilities" id="facilities" class="hidden"
                                                        type="input" x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none
                                                            / poor<br>facilities!</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many
                                                            / great<br> facilities!</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="facilities_text" id="facilities_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="facilitiesbtn"
                                                    onclick="newAction('facilities')"
                                                    class="px-4 text-2xl py-2 bg-white text-gray-800 hover:bg-gray-100 active:bg-gray-200 focus:outline-none font-bold mt-4">Save</button>
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
                                style="top: 25%; left: 0; transform: translate(-50%, -50%)">beauty</button>

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
                                                <h1 class="py-4 text-3xl font-bold">Beauty</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md mx-auto pb-4">
                                                    <input name="noise" id="noise" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="w-80 block h-3 bg-white rounded-lg appearance-none cursor-pointer range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="w-full flex justify-between text-xs px-2">
                                                        <span>|</span>
                                                        <span>|</span>
                                                        <span>|</span>
                                                    </div>
                                                    <div class="flex justify-between">
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ugly</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">beautiful</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <button type="button" name="noise_text" id="noise_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#CDB8EB] focus:border-transparent">Record!</button>
                                                </div>
                                                <button type="button" id="noisebtn" onclick="newAction('noise')"
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
            </form>
        </div>
    </div>
    <script>
        placeid = document.getElementById('placeid').value;
        type = document.getElementById('type').value;

        function newAction(action) {
            console.log(action);
            url = "/enjoydetail"
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
    </style>
@endsection
