@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div class="px-4 pt-4" x-data="{ tab: 'observation' }">
        <a href="/" class="flex justify-start items-start bg-black my-4 mx-2 p-1.5 w-7 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"
                class="w-4 h-4 text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>

        </a>

        <input type="text" class="w-full px-2 py-2 bg-white rounded-full"
            placeholder="Choose tags or add new city layers" name="searchInput" id="searchInput">



        <div class="flex items-center justify-center mt-12">
            <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="place()">
                <div class="flex flex-col w-[75px] justify-center items-center">
                    <div class="bg-[#1976d2] border-2 border-white rounded-full shadow-xl"
                        :class="tab == 'place' || tab == 'place1' ?
                            'bg-[#1976d2] z-10 p-[22px]' :
                            'bg-[#1976d2]/70 p-[35px]'">
                        <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                            :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'" id="place" alt="">
                    </div>
                    <div class="pl-2 font-semibold text-justify" :class="tab == 'place' ? 'text-black' : 'text-black/50'">
                        Browse Places
                    </div>
                </div>
            </div>
            <div class="-ml-2 cursor-pointer" @click="tab='observation'" onclick="observation()">
                <div class="flex flex-col w-[75px] justify-center items-center">

                    <div class="flex items-center justify-center border-2 border-white rounded-full shadow-xl"
                        :class="tab == 'observation' || tab == 'observation1' ?
                            'bg-[#ffa726] z-10 p-[16px]' :
                            'bg-[#ffa726]/70 p-[35px]'">
                        <span class="flex items-center justify-center w-10 h-10"
                            :class="tab == 'observation' || tab == 'observation1' ? 'block' :
                                'hidden'"
                            id="observation" alt="">🔍</span>
                    </div>

                    <div class="pl-8 font-semibold text-justify"
                        :class="tab == 'observation' ? 'text-black' : 'text-black/50'">
                        Browse Observations
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ active: '' }">
            <div class="flex flex-col items-center justify-center gap-10 mt-6 italic font-semibold" x-show="tab=='place'">
                <div class="grid grid-cols-3 gap-8" id="searchResultsPls">
                    @foreach ($allPlaces as $pls)
                        <div class="flex flex-col items-center justify-center w-[80px]"
                            @click="active='OB_{{ $pls->id }}'" onclick="select_place({{ $pls->id }})">
                            <div class="rounded-full bg-[#1976d2]  p-[20px]"
                                :class="active == 'OB_{{ $pls->id }}' ?
                                    'border-4 border-blue-300' :
                                    ''">
                                <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                            </div>
                            <span class="mt-2 text-black">{{ $pls->name }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div x-data="{ active: '' }">
            <div class="flex flex-col items-center justify-center gap-10 mt-6 italic font-semibold"
                x-show="tab=='observation'">
                <div class="grid grid-cols-3 gap-8" id="searchResultsObs">
                    @foreach ($subobservs as $obs)
                        <div class="flex flex-col items-center justify-center w-[80px]"
                            @click="active='OB_{{ $obs->id }}'" onclick="select_observation({{ $obs->id }})">
                            <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                                :class="active == 'OB_{{ $obs->id }}' ?
                                    'border-4 border-yellow-100' :
                                    ''">
                                <div class="flex">
                                    <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-8 h-8 -mr-1"> <img
                                        src="{{ asset('new_img/happy.png') }}" alt="" class="w-8 h-8 -ml-1">
                                </div>
                            </div>

                            <span class="mt-2 text-black">{{ $obs->name }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>



        <div class="flex items-center  justify-center pt-[20%] pb-4 bg-white">
            <div onclick="submitData()"
                class="flex cursor-pointer items-center justify-center gap-2 px-4 py-3 text-lg font-extrabold text-white bg-[#1976d2] rounded-3xl hover:shadow  hover:bg-blue-400 transition-all">

                Submit</div>
        </div>
        <input class="hidden" type="text" name="latitude" id="latitude" value="">
        <input class="hidden" type="text" name="longitude" id="longitude" value="">

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



        var parent = {!! json_encode($obser) !!};


        var placeId = '';

        function select_place(id) {
            placeId = id;
        }

        var observationId = '';

        function select_observation(id) {
            observationId = id;
        }



        function submitData() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            latitude = document.getElementById('latitude').value;
            longitude = document.getElementById('longitude').value;

            $.ajax({
                type: 'POST',
                url: "{{ route('map.add.place') }}",
                data: {
                    observation_id: parent.id,
                    observation_child_id: observationId,
                    latitude: latitude,
                    longitude: longitude,
                },
                success: function(data) {
                    swal({
                        icon: "success",
                        text: data.msg,

                    })

                    // window.location.href = "/";


                }
            });

        }

        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                let query = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('sub-search-ob') }}",
                    method: 'GET',
                    data: {
                        query: query,
                        id: parent.id
                    },
                    success: function(response) {



                        $('#searchResultsPls').empty();

                        $('#searchResultsObs').empty();

                        response.resultsPls.forEach(function(result) {

                            $('#searchResultsPls').append(`
                            <div class="flex flex-col items-center justify-center w-[80px]"
                                @click="active='PL_` +
                                result.id +
                                `'"
                                onclick="select_place(` + result.id + `)">
                                <div class="rounded-full bg-[#1976d2]  p-[20px]"
                                    :class="active == 'PL_` +
                                result.id +
                                `' ?
                                        'border-4 border-blue-300' :
                                        ''">
                                    <img src="{{ asset('new_img/image.png') }}"
                                        class="w-7 h-7" />
                                </div>
                                <span class="mt-2 text-black">` + result.name + `</span>
                            </div>
                        `); // Adjust based on your model properties
                        });

                        response.resultsObs.forEach(function(result) {

                            $('#searchResultsObs').append(`
                       <div class="flex flex-col items-center justify-center w-[80px]"
                                  @click="active='OB_` + result.id + `'"
                                   onclick="select_observation(` + result.id + `)">
                                <div class="rounded-full bg-[#ffa726] px-[8px] py-[18px]"
                                   :class="active == 'OB_` + result.id + `' ?
                                  'border-4 border-yellow-100' :
                               ''">
                         <div class="flex">
                         <img src="{{ asset('new_img/sad.png') }}" alt=""
                            class="w-8 h-8 -mr-1"> <img
                             src="{{ asset('new_img/happy.png') }}" alt=""
                                  class="w-8 h-8 -ml-1">
                                </div>
                        </div>

                      <span class="mt-2 text-black">` + result.name + `</span>
                  </div>
                          `); // Adjust based on your model properties
                        });

                    }
                });
            });
        });
    </script>
@endsection
