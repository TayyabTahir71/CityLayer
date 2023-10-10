@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label for="image" class="relative">
                <img class="object-cover rounded-full avatar_image"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                
            </label>
            <div class="flex-r pt-4">
                <div class="bl">Dashboard</div>
               
            </div>
        </div>

        <div class="grid grid-cols-1">
            <div class="">
                {{-- @include('item_community_acheivements', compact('usersWithTotals')) --}}

                {{-- <div class="belo m-4">
                    @if ($usersWithTotals->hasMorePages())
                        <div class="first load-more-button cursor-pointer" data-page="{{ $usersWithTotals->currentPage() + 1 }}">see <div class="plu">+</div> all</div>
                    @endif
                    <a href="/" class="scnd mt-2">Back</a>
                </div> --}}
            </div>
        </div>

        <div class="flex flex-col  mx-auto">
            <div class="">

                @forelse ($all_data as $data)
                    <a href="/place/{{ $data['id'] }}/{{ strtolower($data['type']) }}">
                        <div class="flex p-2 mb-2 bg-white border rounded shadow-md">
                            @php $img = $data['image'] ?? null; @endphp
                            <img src="{{ asset('storage' . $img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                            <div class="flex flex-col justify-center w-full px-2 py-1">

                                <div class="flex items-center justify-between ">
                                    <div class="flex flex-col">
                                        <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['type'] }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between ">
                                <div class="flex flex-col pr-4">
                                    <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['latitude'] }}</h2>
                                    <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $data['longitude'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                

            </div>
            <div class="dashboard">

                <a href="/street" class="fdas">
                    <div class="parto">
                        <div class="location">
                            <img  src="{{asset('img/image.png')}}" class="img" alt="not found"/>
                        </div>
                        <div class="text1">
                            Street
                        </div>
                    </div>
                    <div class="parts">
                        Edit
                    </div>
                </a>
                <a href="/building" class="fdas">
                    <div class="parto">
                        <div class="location">
                            <img  src="{{asset('img/image.png')}}" class="img" alt="not found"/>
                        </div>
                        <div class="text1">
                            Building
                        </div>
                    </div>
                    <div class="parts">
                        Edit
                    </div>
                </a>
                <a href="/openspace" class="fdas">
                    <div class="parto">
                        <div class="location">
                            <img  src="{{asset('img/image.png')}}" class="img" alt="not found"/>
                        </div>
                        <div class="text1">
                            Open space
                        </div>
                    </div>
                    <div class="parts">
                        Edit
                    </div>
                </a>
                <div class="fdas">
                    <div class="parto">
                        <div class="location1">
                            <img  src="{{asset('img/excited.png')}}" class="img" alt="not found"/>
                            <img  src="{{asset('img/funny.png')}}" class="img" alt="not found"/>
                        </div>
                        <div class="text1">
                            Observation A
                        </div>
                    </div>
                    <div class="parts">
                        Edit
                    </div>
                </div>
            </div>

           
        </div>
    </div>
   
@endsection
