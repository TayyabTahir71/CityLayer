@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div>
        <div class="relative pt-24" x-cloak x-data="{ tab: 'place' }">
            <div class="flex items-center justify-center mt-6">
                <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="place()">
                    <div class="flex flex-col">
                        <div class="bg-[#1976d2] border-2 border-white rounded-full shadow-xl"
                            :class="tab == 'place' || tab == 'place1' ? 'bg-[#1976d2] z-10 p-[22px]' :
                                'bg-[#1976d2]/70 p-[35px]'">
                            <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'" id="place"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="-ml-2 cursor-pointer" @click="tab='observation'" onclick="observation()">
                    <div class="flex flex-col">

                        <div class="flex items-center justify-center border-2 border-white rounded-full shadow-xl"
                            :class="tab == 'observation' || tab == 'observation1' ? 'bg-[#ffa726] z-10 p-[16px]' :
                                'bg-[#ffa726]/70 p-[35px]'">
                            <span class="flex items-center justify-center w-10 h-10"
                                :class="tab == 'observation' || tab == 'observation1' ? 'block' : 'hidden'" id="observation"
                                alt="">🔍</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="hidden" id="btn1" @click="tab='observation1'"></div>
            <div class="flex flex-col items-center justify-center px-6 pt-6" x-show="tab=='place'">
                <input type="text" name="place_name" class="w-full px-2 py-2 bg-gray-200 rounded-full"
                    placeholder="What is this place?" id="place_name">
                <span id="errorTxt" class="text-red-500"></span>
                <span class="mt-2 italic font-semibold">Add new place</span>
            </div>
            <div class="flex flex-col items-center justify-center px-6 pt-6" x-show="tab=='observation'"> <input
                    type="text" name="observation_name" class="w-full px-2 py-2 bg-gray-200 rounded-full" placeholder=""
                    id="observation_name">
                <span id="errorTxt" class="text-red-500"></span>
                <span class="mt-2 italic font-semibold">Add new Observation</span>
            </div>
            <div class="flex flex-col items-center justify-center px-6 pt-6" x-show="tab=='observation1'">
                <input type="text" class="w-full px-2 py-2 bg-gray-200 rounded-full" placeholder="" id="">

                <span class="mt-2 italic font-semibold">Choose tags or add a new observation</span>
            </div>
            <div class="flex flex-col items-center justify-center px-6 pt-6" x-show="tab=='place1'">
                <input type="text" class="w-full px-2 py-2 bg-gray-200 rounded-full" placeholder="" id="">
                <span class="mt-2 italic font-semibold">Choose tags or add a new place</span>
            </div>


            <div class="" x-data="{ 'active': '' }">
                <div class="flex items-center justify-center gap-2 pt-10 italic font-semibold" x-show="tab=='observation1'">
                    <div class="flex flex-col items-center justify-center">
                        <a href="">
                            <div class="rounded-full bg-[#ffa726] border-2  p-[22px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                    stroke="currentColor" class="w-6 h-6 font-bold text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Add new</span>
                        </a>
                    </div>
                    <div class="flex flex-col items-center justify-center cursor-pointer"
                        @click="active='OB_{{ $observations[0]->id }}'"
                        onclick="select_observation({{ $observations[0]->id }})">
                        <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                            :class="active == 'OB_{{ $observations[0]->id }}' ?
                                'border-4 border-yellow-100' :
                                ''">
                            <div class="flex">
                                <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-8 h-8 -mr-1"> <img
                                    src="{{ asset('new_img/happy.png') }}" alt="" class="w-8 h-8 -ml-1">
                            </div>
                        </div>
                        <span class="mt-2 text-black">{{ $observations[0]->name }}</span>

                    </div>

                    <div class="flex flex-col items-center justify-center cursor-pointer"
                        @click="active='OB_{{ $observations[1]->id }}'"
                        onclick="select_observation({{ $observations[1]->id }})">
                        <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                            :class="active == 'OB_{{ $observations[1]->id }}' ?
                                'border-4 border-yellow-100' :
                                ''">
                            <div class="flex">
                                <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-8 h-8 -mr-1"> <img
                                    src="{{ asset('new_img/happy.png') }}" alt="" class="w-8 h-8 -ml-1">
                            </div>
                        </div>
                        <span class="mt-2 text-black">{{ $observations[1]->name }}</span>

                    </div>

                    <div class="flex flex-col items-center justify-center">
                        <a href="/all-places">
                            <div class="rounded-full border-[#ffa726] border-2  p-[22px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="3" stroke="currentColor" class="w-6 h-6 font-bold text-[#ffa726]">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">See more</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center gap-2 pt-10 italic font-semibold" x-show="tab=='place1'">
                <div class="flex flex-col items-center justify-center">
                    <a href="/all-places">
                        <div class="rounded-full bg-blue-500 border-2  p-[22px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor" class="w-6 h-6 font-bold text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>

                        </div>
                        <span class="mt-2 text-black">Add new</span>
                    </a>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div wire:click="selected_place('place_1')" class="rounded-full bg-blue-500  p-[35px]">

                    </div>
                    <span class="mt-2 text-black">Place 1</span>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <div wire:click="selected_place('place_2')" class="rounded-full bg-blue-500  p-[35px]">

                    </div>
                    <span class="mt-2 text-black">Place 2</span>
                </div>

                <div class="flex flex-col items-center justify-center">
                    <a href="/all-places">
                        <div class="rounded-full border-blue-500 border-2  p-[22px]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor" class="w-6 h-6 font-bold text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>

                        </div>
                        <span class="mt-2 text-black">See more</span>
                    </a>
                </div>





            </div>

            <div class="flex items-center justify-center gap-2 italic font-semibold pt-28" x-show="tab=='observation'">

                <div class="" @click="tab='place1'">
                    <img class="w-16 h-16" src="{{ asset('img/comfortable.png') }}" alt="">
                </div>
                <div class="" @click="tab='place1'">
                    <img class="w-16 h-16" src="{{ asset('img/confused.png') }}" alt="">
                </div>
                <div class="" @click="tab='place1'">
                    <img class="w-16 h-16" src="{{ asset('img/sad.png') }}" alt="">
                </div>
                <div class="" @click="tab='place1'">
                    <img class="w-16 h-16" src="{{ asset('img/happy.png') }}" alt="">
                </div>
                <div class="" @click="tab='place1'">
                    <img class="w-16 h-16" src="{{ asset('img/disgusted.png') }}" alt="">
                </div>


            </div>

            <div class="absolute top-[80vh] left-24 right-24" x-show="tab == 'place'" x-data="{ openDes: false }">
                <div class="flex items-center justify-between">

                    <input type="file" wire:model='place_image' class="hidden" name="" id="image-upload">
                    <label for="image-upload">
                        <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-10 h-9">
                    </label>

                    <img src="{{ asset('img/msg.PNG') }}" @click="openDes=true" alt="" class="w-10 h-9">
                </div>
                {{-- <div x-cloak x-show="openDes" class="bg-white " aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div x-cloak x-show="openDes" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="z-50 w-full max-w-xl transition-all transform">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div> --}}
            </div>
            <div class="absolute top-[80vh] left-24 right-24" x-show="tab == 'observation'" x-data="{ openDes: false }">
                <div class="flex items-center justify-between">

                    <input type="file" wire:model='observation_image' class="hidden" name=""
                        id="image-upload">
                    <label for="image-upload">
                        <img src="{{ asset('img/cam.PNG') }}" alt="" class="w-10 h-9">
                    </label>

                    <img src="{{ asset('img/msg-2.PNG') }}" @click="openDes=true" alt="" class="w-10 h-9">
                </div>
                {{-- <div x-cloak x-show="openDes" class="bg-white " aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div x-cloak x-show="openDes" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="z-50 w-full max-w-xl transition-all transform">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div> --}}
            </div>





            <div class="fixed left-0 right-0 bottom-4">
                <div class="flex items-center justify-center gap-2">
                    <a href="/" class="px-6 py-3 border-2 border-blue-500 rounded-3xl">
                        <span class="text-xl font-semibold text-blue-500">
                            Cancel
                        </span>
                    </a>

                    <button onclick="submitPlace()" x-show="tab=='place'"
                        class="px-6 py-3 bg-blue-500 border-4 border-white rounded-3xl hover:shadow  hover:bg-blue-400 transition-all cursor-pointer">
                        <span class="text-xl font-semibold text-white">
                            Submit
                        </span>
                    </button>
                    <button onclick="submitObservation()" x-show="tab=='observation1'"
                        class="px-6 py-3 bg-blue-500 border-4 border-white rounded-3xl hover:shadow  hover:bg-blue-400 transition-all cursor-pointer">
                        <span class="text-xl font-semibold text-white">
                            Submit
                        </span>
                    </button>

                </div>
            </div>
        </div>
        <input class="hidden" type="text" wire:model="latitude" id="latitude" value="">
        <input class="hidden" type="text" wire:model="longitude" id="longitude" value="">
    </div>
    <script>
        if (navigator.geolocation) {
            //wait 3 seconds to get position
            console.log(getposition());

        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function getposition() {

            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        document.getElementById('latitude').value = pos.coords.latitude.toFixed(6);
                        document.getElementById('longitude').value = pos.coords.longitude.toFixed(6);
                        // success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }

        }




        console.log(placeName)



        function select_place(id) {
            placeId = id;
        }

        var observationId = '';

        function select_observation(id) {
            observationId = id;
        }

        function see() {

            var btnid = document.getElementById("btn1");
            btnid.click();
        }



        function submitPlace() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            latitude = document.getElementById('latitude').value;
            longitude = document.getElementById('longitude').value;
            placeName = document.getElementById('place_name').value;

            if (!placeName) {

                $('#errorTxt').html('Place name is required!')
                return false;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('map.add.place') }}",
                data: {
                    place_name: placeName,
                    add_new_place: true,
                    observation_id: observationId,
                    latitude: latitude,
                    longitude: longitude,
                },
                success: function(data) {
                    swal({
                        icon: "success",
                        text: data.msg,

                    })

                    var btnid = document.getElementById("btn1");
                    btnid.click();
                    // window.location.href = "/";

                }
            });

        }

        function submitObservation() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            latitude = document.getElementById('latitude').value;
            longitude = document.getElementById('longitude').value;
            // placeName = document.getElementById('place_name').value;

            $.ajax({
                type: 'POST',
                url: "{{ route('map.add.place') }}",
                data: {
                    observation_id: observationId,
                    latitude: latitude,
                    longitude: longitude,
                },
                success: function(data) {
                    swal({
                        icon: "success",
                        text: data.msg,

                    })
                    window.location.href = "/";

                }
            });

        }
    </script>
@endsection
@push('scripts')
@endpush
