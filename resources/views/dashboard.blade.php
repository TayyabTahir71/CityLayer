@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">

            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
                <div class="flex flex-row justify-between">
                    <h4 class="pt-4 mt-2 font-semibold text-gray-900 ">Start New Mapping:</h4>
                    <h4 class="pt-4 mt-2 font-semibold text-gray-900 ">Points: {{ $score }}</h4>
                </div>
                <div class="flex items-center justify-between space-x-3 overflow-y-scroll">
                    <a href="street" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-green-200 shadow cursor-pointer hover:bg-green-300 active:bg-green-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-road"></i>
                            <p class="mt-1 text-xs ">Street</p>
                        </div>
                    </a>
                    <a href="building" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-yellow-200 shadow cursor-pointer hover:bg-yellow-300 active:bg-yellow-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-building"></i>
                            <p class="mt-1 text-xs ">Building</p>
                        </div>
                    </a>
                    <a href="openspace" class="prevent">
                        <div
                            class="flex flex-col items-center justify-center w-20 h-20 p-1 mb-2 text-gray-800 transition duration-300 ease-in bg-indigo-200 shadow cursor-pointer hover:bg-indigo-300 active:bg-indigo-400 rounded-2xl hover:shadow-md">
                            <i class="fa-solid fa-street-view"></i>
                            <p class="mt-1 text-xs ">Open space</p>
                        </div>
                    </a>
                </div>

                <h4 class="font-semibold text-gray-900 ">Your Mapping data:</h4>
                <div class="grid grid-cols-1">
                    <div class="">

                        @forelse ($all_data as $data)
                        <a href="">
                            <div class="flex p-2 mb-2 bg-white border rounded shadow-md">
                               @php $img = $data['image'] ?? null; @endphp
                                <img src="{{ asset($img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <div class="flex flex-col justify-center w-full px-2 py-1">

                                    <div class="flex items-center justify-between ">
                                        <div class="flex flex-col">
                                            <h2 class="text-sm font-medium text-gray-800 ">{{ $data['type'] }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
