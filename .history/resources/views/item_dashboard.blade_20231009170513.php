{{-- @forelse ($usersWithTotals as $user) --}}

                    <div class="flex p-2 mt-8 mb-2">
                        <div class="location1">
                            <img  src="{{asset('img/excited.png')}}" class="img" alt="not found"/>
                            <img  src="{{asset('img/funny.png')}}" class="img" alt="not found"/>
                        </div>
                        <div class="flex flex-col justify-center w-full px-2 py-1">

                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <h2 class="pl-2 italic text-base font-bold">{{ $user->name }}</h2>
                                </div>
                                  <div class="flex flex-col mr-2">
                                    <h2 class="pl-4 text-sm font-normal text-gray-800">Places added {{$user->total_places}}</h2>
                                    <h2 class="pl-4 mt-2 text-sm font-normal text-gray-800">Observations added {{$user->total_observations}}</h2>
                                </div>
                            </div>
                        </div>
    
              
                    </div>

                    
            
                {{-- @endforeach --}}
                