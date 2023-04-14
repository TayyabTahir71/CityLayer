
@extends('layouts.app')

@section('main')
    <div data-barba="container">
        @include('parts.navbar')
        <div class="flex flex-col h-screen mx-auto">

            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
              
                <div class="grid grid-cols-1">
                    <div class="">

                        @forelse ($users as $user)
      
                            <div class="flex p-2 mt-8 mb-2 bg-white border rounded shadow-md">
                               @php $img = $user['avatar'] ?? null; @endphp
                                <img src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="Just a flower" class="object-cover w-16 h-16 rounded" onerror="this.src='/img/empty.png'">
                                <div class="flex flex-col justify-center w-full px-2 py-1">

                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <h2 class="pl-4 text-sm font-medium text-gray-800">{{ $user['name'] }}</h2>
                                        </div>
                                          <div class="flex flex-col pr-8">
                                            <h2 class="pl-4 text-xs font-medium text-gray-800">Street: {{ count($street->where('user_id', $user['id'])) }}</h2>
                                             <h2 class="pl-4 text-xs font-medium text-gray-800">Building: {{ count($building->where('user_id', $user['id'])) }}</h2>
                                              <h2 class="pl-4 text-xs font-medium text-gray-800">Openspace: {{ count($openspace->where('user_id', $user['id'])) }}</h2>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="flex items-center justify-between ">
                                        <div class="flex flex-col pr-4">
                                             <h2 class="pl-4 text-sm font-medium text-gray-800">Score: {{ $user->score }}</h2>
                                        </div>
                                    </div>
                            </div>
                    
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
