@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <form action="save_profile" class="flex flex-col  justify-center p-4 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer new" >
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('img/avatar.png')}}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">

            </label>
            <div class="dash">Community achievements</div>
        </form>

        <div class="flex flex-col  mx-auto">

            <div class="dashboard">


                <div class="ddas">
                    <div class="fist">
                        <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                               onchange="javascript:this.form.submit();">
                        <label for="image" class="cursor-pointer new" >
                            <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage "
                                 src="{{asset('img/avatar.png')}}" alt="">
                        </label>
                        <div class="taz">   Citymapper</div>
                    </div>
                    <div class="scn">
                        <div class="taz">   Places mapped:xx</div>
                        <div class="taz">   Observations mapped:xx</div>
                    </div>

                </div>
                <div class="ddas">
                    <div class="fist">
                        <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                               onchange="javascript:this.form.submit();">
                        <label for="image" class="cursor-pointer new" >
                            <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  nimage"

                                 src="{{asset('img/avatar.png')}}" alt="">
                        </label>
                        <div class="taz">   Citymapper</div>
                    </div>
                    <div class="scn">
                        <div class="taz">   Places mapped:xx</div>
                        <div class="taz">   Observations mapped:xx</div>
                    </div>

                </div>
                <div class="ddas">
                    <div class="fist">
                        <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                               onchange="javascript:this.form.submit();">
                        <label for="image" class="cursor-pointer new" >
                            <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  nimage"
                                 src="{{asset('img/avatar.png')}}" alt="">
                        </label>
                        <div class="taz">   Citymapper</div>
                    </div>
                    <div class="scn">
                        <div class="taz">   Places mapped:xx</div>
                        <div class="taz">   Observations mapped:xx</div>
                    </div>

                </div>
                <div class="ddas">
                    <div class="fist">
                        <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                               onchange="javascript:this.form.submit();">
                        <label for="image" class="cursor-pointer new" >
                            <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  nimage"
                                 src="{{asset('img/avatar.png')}}" alt="">
                        </label>
                        <div class="taz">   Citymapper</div>
                    </div>
                    <div class="scn">
                        <div class="taz">   Places mapped:xx</div>
                        <div class="taz">   Observations mapped:xx</div>
                    </div>

                </div>

            </div>
            <br/>
            <div class="belo">
                <div class="first">see <div class="plu">+</div> all</div>
                <div class="scnd">Back</div>
            </div>

            {{--            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">--}}
            {{--                <div class="flex flex-row justify-between">--}}
            {{--                    <h4 class="pt-4 mt-2 font-semibold text-gray-900 ">{{ __('messages.Start New Mapping:') }}</h4>--}}
            {{--                    <h4 class="pt-4 mt-2 font-semibold text-gray-900 ">{{ __('messages.Points:') }} {{ backpack_auth()->user()->score }}</h4>--}}
            {{--                </div>--}}
            {{--                <div class="flex items-center justify-between space-x-3 overflow-y-scroll">--}}
            {{--                    <a href="/street" class="prevent">--}}
            {{--                        <div--}}
            {{--                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-green-200 shadow cursor-pointer hover:bg-green-300 active:bg-green-400 rounded-2xl hover:shadow-md">--}}
            {{--                            <i class="fa-solid fa-road"></i>--}}
            {{--                            <p class="mt-1 text-xs ">{{ __('messages.Street') }}</p>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                    <a href="/building" class="prevent">--}}
            {{--                        <div--}}
            {{--                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-yellow-200 shadow cursor-pointer hover:bg-yellow-300 active:bg-yellow-400 rounded-2xl hover:shadow-md">--}}
            {{--                            <i class="fa-solid fa-building"></i>--}}
            {{--                            <p class="mt-1 text-xs ">{{ __('messages.Building') }}</p>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                    <a href="/openspace" class="prevent">--}}
            {{--                        <div--}}
            {{--                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-indigo-200 shadow cursor-pointer hover:bg-indigo-300 active:bg-indigo-400 rounded-2xl hover:shadow-md">--}}
            {{--                            <i class="fa-solid fa-street-view"></i>--}}
            {{--                            <p class="mt-1 text-xs ">{{ __('messages.Open space') }}</p>--}}
            {{--                        </div>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--                 <div class="flex flex-row justify-between">--}}
            {{--                    <h4 class="font-semibold text-gray-900 ">{{ __('messages.Current Location:') }}</h4>--}}
            {{--                     <h4 class="text-sm text-gray-900 " id="mylocation"></h4>--}}
            {{--                </div>--}}

            {{--                                    <h4 class="text-xl font-semibold text-center text-gray-900">{{ __('messages.My Mapping data:') }}</h4>--}}
            {{--                <div class="grid grid-cols-1">--}}
            {{--                    <div class="">--}}

            {{--                        @forelse ($all_data as $data)--}}
            {{--                        <a href="/place/{{ $data['id'] }}/{{ strtolower($data['type']) }}">--}}
            {{--                            <div class="flex p-2 mb-2 bg-white border rounded shadow-md">--}}
            {{--                               @php $img = $data['image'] ?? null; @endphp--}}
            {{--                                <img src="{{ asset('storage' . $img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">--}}
            {{--                                <div class="flex flex-col justify-center w-full px-2 py-1">--}}

            {{--                                    <div class="flex items-center justify-between ">--}}
            {{--                                        <div class="flex flex-col">--}}
            {{--                                            <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['type'] }}</h2>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="flex items-center justify-between ">--}}
            {{--                                        <div class="flex flex-col pr-4">--}}
            {{--                                            <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['latitude'] }}</h2>--}}
            {{--                                             <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['longitude'] }}</h2>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                            </div>--}}
            {{--                            </a>--}}
            {{--                        @empty--}}
            {{--                        @endforelse--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
    <script>

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    document.getElementById("mylocation").innerHTML = pos.lat + " " + pos.lng;
                },
                function(e) {}, {
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 5000
                });
        }
    </script>
@endsection
