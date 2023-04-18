@extends('layouts.app')

@section('main')
    <div data-barba="container">

        <div class="flex flex-col h-screen mx-auto">
  <div id="message" class="fixed p-2 font-bold text-white bg-green-500 border rounded top-5 right-5"></div>
                 <div class="flex flex-row justify-between pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a> <button id="skip" class="mt-6 mr-4 text-sm text-gray-800">Skip</button>
                 </div>
            <form action="spaceusage" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <h1 class="mx-8 text-3xl font-bold text-center text-gray-900">{{ __('messages.Let others know how well the space is used!') }}
                    </h1>
                    <div class="pb-8">

                        <div x-data="{ total_value: 50 }" class="max-w-screen-md pt-4 pb-16 mx-auto">
                            <input name="know_space" id="know_space" class="hidden" type="input" x-model="total_value" />
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.unfit or wrong!') }}</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great!') }}</label>
                            </div>
                            <div class="flex justify-between w-full px-2 py-2 text-xs">
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
                                class="block h-3 bg-gray-300 rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                type="range" x-model="total_value" min="0" max="100" step="5">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="hidden" name="placeid" id="placeid" value="{{ $placeid }}">

                        </div>
                    </div>
                    <div class="relative flex items-center justify-center w-64 h-64">

                      
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                               class="absolute rounded-full bg-[#FAC710] w-28 h-28 text-white font-bold"
                                style="bottom: 100%; right: 50%; transform: translate(50%, 50%)">{{ __('messages.fun to') }}<br>{{ __('messages.spend time') }}</button>

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
                                        class="mymodal inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#FAC710] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Fun to spend time') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="spend_time" id="spend_time" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0" max="100"
                                                        step="5">
                                                    <div class="flex justify-between w-full px-2 py-2 text-xs">
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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.not at all!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.very fun!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="spend_time_text" id="spend_time_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#FAC710] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="activitiesbtn" onclick="newAction('spend_time')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- place to rest --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#FAC710] w-28 h-28 text-white font-bold"
                                style="bottom: 50%; right: 50%; transform: translate(50%, 50%)">{{ __('messages.meeting friends') }}</button>

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
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#FAC710] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.Meeting friends') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="meeting" id="meeting" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="flex justify-between w-full px-2 py-2 text-xs">
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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.bad meeting spot!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.great meeting spot!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="meeting_text" id="meeting_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#FAC710] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="restbtn" onclick="newAction('meeting')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- walk roll --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#FAC710] w-28 h-28 text-white font-bold"
                                style="top: 90%; right: 90%; transform: translate(50%, -50%)">{{ __('messages.events') }}<br>{{ __('messages.in space') }}</button>

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
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#FAC710] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 text-3xl font-bold">{{ __('messages.events in space') }}</h1>
                                                <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="events" id="events" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="flex justify-between w-full px-2 py-2 text-xs">
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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.never') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.often!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="events_text" id="events_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#FAC710] focus:border-transparent"
                                                        placeholder="{{ __('messages.Tell us more!') }}">
                                                </div>
                                                <button type="button" id="movementbtn" onclick="newAction('events')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- visibility --}}
                        <div x-data="{ modelOpen: false }">
                            <button type="button" id="play" @click="modelOpen =!modelOpen"
                                class="absolute rounded-full bg-[#FAC710] w-28 h-28 text-white font-bold"
                                style="top: 90%; right: 10%; transform: translate(50%, -50%)">{{ __('messages.multi') }}-<br>{{ __('messages.functional') }}</button>

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
                                        class="inline-block w-full max-w-xl overflow-hidden transition-all transform bg-[#FAC710] rounded-lg shadow-xl 2xl:max-w-2xl z-60 md:mt-60">

                                        <div class="items-center pt-3 space-x-4 bloc">
                                            <div class="flex flex-col justify-center">
                                                <h1 class="py-4 mx-2 text-3xl font-bold">{{ __('messages.Multifunctional!') }}</h1>
                                                   <div x-data="{ total_value: 50 }" class="max-w-screen-md pb-4 mx-auto">
                                                    <input name="multifunctional" id="multifunctional" class="hidden" type="input"
                                                        x-model="total_value" />

                                                    <input id="range2"
                                                        class="block h-3 bg-white rounded-lg appearance-none cursor-pointer w-80 range-lg "
                                                        type="range" x-model="total_value" min="0"
                                                        max="100" step="5">
                                                    <div class="flex justify-between w-full px-2 py-2 text-xs">
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
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.cant be used') }}<br>{{ __('messages.for anything else!') }}</label>
                                                        <label for="default-range"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('messages.can be used') }}<br>{{ __('messages.for many things!') }}</label>
                                                    </div>

                                                </div>
                                                <div>
                                                    <input type="text" name="multifunctional_text" id="multifunctional_text"
                                                        class="w-80 h-10 rounded-lg focus:outline-none focus:ring-1 focus:ring-[#FAC710] focus:border-transparent"
                                                        placeholder="Tell us more!">
                                                </div>
                                                <button type="button" id="orientationbtn"
                                                    onclick="newAction('multifunctional')"
                                                    class="px-4 py-2 mt-4 text-2xl font-bold text-gray-800 bg-white hover:bg-gray-100 active:bg-gray-200 focus:outline-none">{{ __('messages.Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
              
                    </div>
                    <button id="saveplace" type="submit"
                        class="px-4 text-2xl py-2 text-gray-800 bg-[#FAC710] hover:bg-purple-300 active:bg-purple-400 border focus:outline-none rounded-xl font-bold mt-16 mb-4">
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
            url = "/timespendingdetail"
            var thisaction;
            switch (action) {
                case 'spend_time':
                    thisaction = "spend_time";
                    thisvalue = document.getElementById('spend_time').value;
                    thistext = document.getElementById('spend_time_text').value;
                    break;
                case 'meeting':
                    thisaction = "meeting";
                    thisvalue = document.getElementById('meeting').value;
                    thistext = document.getElementById('meeting_text').value;
                    break;
                case 'events':
                    thisaction = "events";
                    thisvalue = document.getElementById('events').value;
                    thistext = document.getElementById('events_text').value;
                    break;
                case 'multifunctional':
                    thisaction = "multifunctional";
                    thisvalue = document.getElementById('multifunctional').value;
                    thistext = document.getElementById('multifunctional_text').value;
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


             showMessage("New points");
                myElement.click();
                myElement1.click();
                myElement2.click();
                myElement3.click();

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
            background: #FAC710;
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
