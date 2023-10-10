@forelse ($usersWithTotals as $user)

                    <div class="flex p-2 mt-8 mb-2">
                       @php $img = $user['avatar'] ?? null; @endphp
                        <img src="{{ asset('storage/uploads/avatar/' . $img) }}" alt="Just a flower" class="object-cover h-20 w-20 rounded-full border-4 border-site" onerror="this.src='/img/empty.png'">
                        <div class="flex flex-col justify-center w-full">

                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <h2 class="pl-2 italic text-base font-bold">{{ $user->name }}</h2>
                                </div>
                                  <div class="flex flex-col">
                                    <h2 class="pl-4 text-sm font-normal text-gray-800">Places added {{$user->total_places}}</h2>
                                    <h2 class="pl-4 mt-2 text-sm font-normal text-gray-800">Observations added {{$user->total_observations}}</h2>
                                </div>
                            </div>
                        </div>
    
              
                    </div>

                    
            
                @endforeach
                