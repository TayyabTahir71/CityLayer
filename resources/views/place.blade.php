@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col mx-auto">
            <div class="pt-16">
                <div class="flex flex-row items-center pt-2">
                     <a href="/dashboard" class="prevent"> <i class="mt-4 ml-4  lg:ml-16 text-2xl text-gray-900 fas fa-close"></i></a>
                 </div>
                <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-16">
                    <h1 class="text-4xl font-semibold text-center text-gray-900">{{ $data->type }}</h1>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Feedback:</legend>
                    <div class="flex justify-center overflow-x-hidden text-sm md:w-4xl">
                        <div class="flex flex-row justify-center pb-4">
                            <div class="flex flex-col">
                                <img src="/img/1.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->likes }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/2.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->dislikes }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/3.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->stars }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/4.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->bof }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/5.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->weird }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/6.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->ohh }}</a>
                            </div>
                            <div class="flex flex-col">
                                <img src="/img/7.png" class="w-8 h-8 mx-1">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->wtf }}</a>
                            </div>

                        </div>
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Location:</legend>
                    <div class="flex justify-center  text-sm md:w-4xl pb-4">
                        <a class="px-4 mx-1 truncate bg-blue-800 text-white rounded" target="_blank">{{ $data->latitude }}</a>
                        <a class="px-4 mx-1 truncate bg-blue-800 text-white rounded" target="_blank">{{ $data->longitude }}</a>

                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Tags:</legend>
                    <div class="flex flex-wrap justify-center overflow-x-hidden text-sm md:w-4xl pb-4">
                        @php $tags = explode(',', $data->tags); @endphp
                        @foreach ($tags as $tag)
                            <a class="px-4 mx-1 truncate bg-[#B8E7EB] rounded" target="_blank">{{ $tag }}</a>
                        @endforeach
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">My feeling:</legend>
                    <div class="flex flex-wrap justify-center overflow-x-hidden text-sm md:w-4xl">
                        @if ($data->feeling == 'happy')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/happy.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->feeling }}</a>
                            </div>
                        @elseif ($data->feeling == 'sad')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/sad.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->feeling }}</a>
                            </div>
                        @elseif ($data->feeling == 'stressed')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/stressed.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->feeling }}</a>
                            </div>
                        @elseif ($data->feeling == 'angry')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/angry.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->feeling }}</a>
                            </div>
                        @elseif ($data->feeling == 'worried')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/worried.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">{{ $data->feeling }}</a>
                            </div>
                        @endif
                    </div>
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Why this feeling:</legend>
                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-full md:w-2/3 h-32 px-4 py-2 border rounded" target="_blank">{{ $data->description }}
                        </p>

                    </div>

                    @php $image0 =  $data->image0 ?? null; @endphp
                    <img src="{{ asset('storage' . $image0) }}" alt="" class="mx-auto w-auto max-h-96"
                        onerror="this.src='/img/empty.png'">

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Opinions:</legend>
                    <div class="flex flex-wrap justify-center overflow-x-hidden text-sm md:w-4xl pb-4">
                        @php $opinions = explode(',', $data->opinions); @endphp
                        @foreach ($opinions as $opinion)
                            <a class="px-4 mx-1 text-white truncate bg-green-800 rounded"
                                target="_blank">{{ $opinion }}</a>
                        @endforeach
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Would you change something in this
                        space:
                    </legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nothing at
                                    all</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many
                                    things</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->change }}%"></div>
                        </div>

                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">What you would change:</legend>
                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-full md:w-2/3 h-32 px-4 py-2 border rounded" target="_blank">
                            {{ $data->description2 }}
                        </p>

                    </div>

                    @php $image0 =  $data->image ?? null; @endphp
                    <img src="{{ asset('storage' . $image0) }}" alt="" class="mx-auto  w-auto max-h-96 pb-8"
                        onerror="this.src='/img/empty.png'">

                    <legend class="pt-8 mb-1 font-medium text-center border-t-2 border-gray-900 text-3xl">How confortable
                        is
                        this space:
                    </legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">uncomfortable</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ver
                                    comfortable</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->confort }}%"></div>
                        </div>

                    </div>



                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Place to rest:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no benches or
                                    other!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great place to
                                    rest!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->rest }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->rest_text }}</p>

                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Walk, roll, bike comfort:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">difficult
                                    movement!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">simple intuitive
                                    movement!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->movement }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->movement_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Play, exercise, activities:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                    activities!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many great
                                    activities!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->activities }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->activities_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">visibility & orientation:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor
                                    difficult!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great
                                    intuitive!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->orientation }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->orientation_text }}</p>
                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">rain & wind protection:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->weather }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->weather_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">facilities:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none / poor
                                    facilities!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many great
                                    facilities!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->facilities }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->facilities_text }}</p>
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">noise:</legend>
                    <div class="md:w-4xl pb-8">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">quiet and
                                    comfortable!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">loud and
                                    iritating!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->noise }}%"></div>
                        </div>

                    </div>



                    {{-- ------------ENJOYABLE----------- --}}
                    <legend class="pt-8 mb-1 font-medium text-center border-t-2 text-3xl border-gray-900">How enjoyable is
                        this space:
                    </legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">unpleasant</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very
                                    pleasant</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->enjoyable }}%"></div>
                        </div>

                    </div>



                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">seasonality:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor in some
                                    season!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great year
                                    round!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->seasonality }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->seasonality_text }}</p>

                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">plants & trees:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->plants }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->plants_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Sunlight:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                    direct sunlight!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">a lot of
                                    sunlight</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->sunlight }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->sunlight_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">shade:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">plenty
                                    shade!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->shade }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->shade_text }}</p>
                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">talking & listening:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very
                                    difficult!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">simple &
                                    effortless!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->talking }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->talking_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">interesting sights:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->interesting }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->interesting_text }}</p>
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">beauty:</legend>
                    <div class="md:w-4xl pb-8">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ugly!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">beautiful!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->beauty }}%"></div>
                        </div>

                    </div>

                    {{-- ------------PROTECTED----------- --}}
                    <legend class="pt-8 mb-1 font-medium text-center border-t-2 text-3xl border-gray-900">How protected is
                        this space:
                    </legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">unpleasant</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very
                                    pleasant</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->protected }}%"></div>
                        </div>

                    </div>



                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">traffic safety:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->protection }}%"></div>
                        </div>

                    </div>



                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">polluants:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">poor!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->polluants }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->polluants_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">night lightning:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                    direct sunlight!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">a lot of
                                    sunlight</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->night }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->night_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">other hazards:</legend>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->hazards }}</p>
                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">dangerous objets:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">none!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">many!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->dangerous }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->dangerous_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">safety from harm:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very
                                    unsafe!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very safe!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#CDB8EB]" style="width: {{ $data->protection_harm }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->protection_harm_text }}
                        </p>
                    </div>

                    {{-- ----------SPENDING--------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl text-2xl">Like spending time or
                        passing
                        through:
                    </legend>
                    <div class="flex flex-wrap justify-center overflow-x-hidden text-sm md:w-4xl">
                        @if ($data->time_spending == 'yes')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/happy.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="ml-1 px-4 mt-2 font-bold truncate rounded"
                                    target="_blank">{{ $data->time_spending }}</a>
                            </div>
                        @elseif ($data->time_spending == 'no')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/sad.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="ml-1 px-4 mt-2 font-bold truncate rounded"
                                    target="_blank">{{ $data->time_spending }}</a>
                            </div>
                        @elseif ($data->time_spending == 'dontknow')
                            <div class="flex flex-col">
                                <img src="{{ asset('img/stressed.png') }}" alt="Just a flower"
                                    class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <a class="px-4 mt-2 font-bold truncate rounded" target="_blank">i don't know</a>
                            </div>
                        @endif
                    </div>

                    {{-- ------------space----------- --}}
                    <legend class="pt-8 mb-1 font-medium text-center border-t-2 text-3xl border-gray-900">How the space is
                        used:
                    </legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">unfit or
                                    wrong!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#FAC710]" style="width: {{ $data->spaceusage }}%"></div>
                        </div>

                    </div>



                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">fun to spend time:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">not at
                                    all!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">very fun!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#FAC710]" style="width: {{ $data->spend_time }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->spend_time_text }}</p>
                    </div>


                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">meeting with friends:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">bad meeting
                                    spot!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">great meeting
                                    spot!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#FAC710]" style="width: {{ $data->meeting }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->meeting_text }}</p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">multifunctional:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no
                                    direct sunlight!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">a lot of
                                    sunlight</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#FAC710]" style="width: {{ $data->multifunctional }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->multifunctional_text }}
                        </p>
                    </div>

                    {{-- -------------------------------- --}}
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">events in space:</legend>
                    <div class="md:w-4xl">
                        <div class="h-16 mx-auto overflow-hidden w-96">
                            <div class="flex justify-between">
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">never!</label>
                                <label for="default-range"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">often!</label>
                            </div>
                            <div class="flex justify-between w-full px-2 text-xs">
                                <span>|</span>
                                <span>|</span>
                                <span>|</span>
                            </div>
                            <div class="block h-8 bg-[#FAC710]" style="width: {{ $data->events }}%"></div>
                        </div>

                    </div>

                    <div class="flex flex-wrap justify-center overflow-y-hidden text-sm md:w-4xl">
                        <p class="w-2/3 h-16 px-4 py-2 border rounded" target="_blank">{{ $data->events_text }}</p>
                    </div>

                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">Who use the space the most:</legend>
                    <div class="flex flex-wrap justify-center overflow-x-hidden text-sm md:w-4xl pb-8">
                        @php $usages = explode(',', $data->usagedetail); @endphp
                        @foreach ($usages as $usage)
                            <a class="px-4 mx-1 truncate bg-[#FAC710] rounded" target="_blank">{{ $usage }}</a>
                        @endforeach
                    </div>

                    
                    @if (backpack_user()->id == $data->user_id)
                    <legend class="pt-4 mb-1 font-medium text-center border-t text-xl">modify:</legend>
                    <div class="flex flex-row justify-between w-96 mx-auto pb-8">
                        <a href="/step2?id={{ $placeid }}&type={{ $type }}" class="w-1/2 mx-1"> <button
                                class="w-full h-12 px-4 py-2 mx-1 text-sm font-medium text-white bg-green-800 rounded">Edit</button></a>

                        <a href="/delete?id={{ $placeid }}&type={{ $type }}" class="w-1/2 mx-1"> <button
                                class="w-full h-12 px-4 py-2 mx-1 text-sm font-medium text-white bg-red-800 rounded">Delete</button></a>
                    </div>
                   @endif

                </div>
            </div>
        </div>
    </div>
@endsection
