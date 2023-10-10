{{-- @forelse ($usersWithTotals as $user) --}}

                    <div class="flex p-2 mt-8 mb-2">
                        <div class="location">
                            <img  src="{{asset('img/worried.png')}}" class="img" alt="not found"/>
                            <img  src="{{asset('img/pleasant.png')}}" class="img" alt="not found"/>
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

                    <div class="flex p-2 mt-8 mb-2">
                        <div class="location bg-site">
                            <img  src="{{asset('img/street.png')}}" class="img" alt="not found"/>
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
                