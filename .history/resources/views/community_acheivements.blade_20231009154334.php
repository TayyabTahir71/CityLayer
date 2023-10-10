@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label  class=" relative">
                <div class="object-cover rounded-full avatar_image flex justify-center items-center text-4xl">
                    🏆
                </div>
            
            </label>
           
            <div class="flex-r pt-4">
                <div class="bl">Community achievements</div>
               
            </div>
            
        </div>

        <div class="grid grid-cols-1">
            <div class="">

                @forelse ($usersWithTotals as $user)

                    <div class="flex p-2 mt-8 mb-2">
                       @php $img = $user['avatar'] ?? null; @endphp
                        <img src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded-full border-4 border-site" onerror="this.src='/img/empty.png'">
                        <div class="flex flex-col justify-center w-full px-2 py-1">

                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <h2 class="pl-2 italic text-base font-bold">{{ $user->name }}</h2>
                                </div>
                                  <div class="flex flex-col mr-2">
                                    <h2 class="pl-4 text-sm font-normal text-gray-800">Places added {{$user->total_places}}</h2>
                                    <h2 class="pl-4 mt-2 text-sm font-normal text-gray-800">Observations added {{ count($building->where('user_id', $user['id'])) }}</h2>
                                    {{-- <h2 class="pl-4 text-xs font-medium text-gray-800">Openspace: {{ count($openspace->where('user_id', $user['id'])) }}</h2> --}}
                                </div>
                            </div>
                        </div>
    
                        {{-- <div class="flex items-center justify-between ">
                                <div class="flex flex-col pr-2">
                                     <h2 class="pl-2 text-sm font-medium text-gray-800">Score: {{ $user->score }}</h2>
                                </div>
                            </div> --}}
                    </div>
            
                @empty
                @endforelse

            </div>
        </div>

        <div class="flex flex-col justify-center">
           

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
                

            </div>
            <br/>
            <div class="belo">
                <div class="first">see <div class="plu">+</div> all</div>
                <div class="scnd">Back</div>
            </div>

            
        </div>
    </div>
    
@endsection
