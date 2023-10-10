{{-- @forelse ($usersWithTotals as $user) --}}

                    <div class="flex p-2 mt-8 mb-2 items-center justify-between">
                        <div class="flex items-center">
                            <div class="h-20 w-20 rounded-full bg-[#ffa500] flex flex-row items-center justify-center text-center">
                                {{-- <img  src="{{asset('img/worried.png')}}" class="h-8" alt="not found"/> --}}
                                {{-- <img  src="{{asset('img/pleasant.png')}}" class="h-8" alt="not found"/> --}}
                                <img  src="{{asset('img/street.png')}}" class="h-10" alt="not found"/>
                            </div>
                            <h2 class="pl-2 italic text-base">Place A</h2>
                        </div>
                        <div class="">

                            <div class="parts bg-site">
                                Edit
                            </div>
                        </div>
                    </div>

                    <div class="flex p-2 mt-8 mb-2">
                        <div class="h-16 w-16 rounded-full flex flex-row items-center justify-center text-center bg-site">
                            <img  src="{{asset('img/street.png')}}" class="h-10" alt="not found"/>
                        </div>
                        <div class="flex flex-col justify-center w-full px-2 py-1">

                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <h2 class="pl-2 italic text-base">Place A</h2>
                                </div>
                                  <div class="flex flex-col">
                                    <div class="parts bg-site">
                                        Edit
                                    </div>
                                </div>
                            </div>
                        </div>
    
              
                    </div>

                    
            
                {{-- @endforeach --}}
                