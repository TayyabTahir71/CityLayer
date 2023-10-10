

<div class="p-6 lg:p-12">
    <a href="/" class="">
        <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

    </a>
    <div class="pt-12 lg:pt-20" x-cloak x-data="{ tab: 'place' }">
        <div x-cloak x-data="{ update: 'close' }">

            <div class="" x-show="update == 'close'">


                <div class="flex items-center justify-center mt-6">

                    <div class="-ml-2 cursor-pointer" @click="update=!update">
                        <div class="flex flex-col justify-center items-center">

                            <div class="h-20 w-20 flex items-center justify-center p-5 text-3xl bg-white border-2 border-black rounded-full">
                                <div class="">👁️</div>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col items-center justify-center pt-6">
                    <div class="flex flex-col items-center justify-center mb-8">

                        <span class="text-xl italic font-bold">
                            Update your City Layers!
                        </span>
                        <div class="text-base italic font-semibold">
                            Add or remove city layers from your map
                        </div>

                    </div>
{{var_dump($observationIds)}}
<br>
{{var_dump($placeIds)}}

{{var.export}}

                    
                    <form wire:submit.prevent="updateMap">
                        <div class="flex gap-8">
                            <div x-data="{ active: 'AC_1' }">
                                <div class="flex flex-col items-center justify-center gap-10 mt-6 italic font-semibold"
                                    x-show="tab=='place'">
                                    <div class="grid grid-cols-3 gap-8">
                                        @foreach ($places as $pls)
                                            <div wire:ignore
                                                class="flex flex-col items-center justify-top text-center w-[80px] cursor-pointer"
                                                >
                                                
                                                <input class="hiddens" type="checkbox" wire:model="formData.{{ $pls->source.'_'.$pls->id }}" value="{{ $pls->id }}"
                                                id="{{ 'checkbox_'.$pls->source.'_'.$pls->id }}"
                                                @if($pls->source === 'place' && in_array($pls->id, $placeIds)) checked @endif
                                                @if($pls->source === 'observation' && in_array($pls->id, $observationIds)) checked @endif
                                                >
                                                

                                                <label for="{{ 'checkbox_'.$pls->source.'_'.$pls->id }}" id="PL_{{ $pls->source.'_'.$pls->id }}" onclick="toggleClass('{{ $pls->source.'_'.$pls->id }}')"
                                                    class="rounded-full  
                                                    
    
                                                    @if($pls->source === 'place' && in_array($pls->id, $placeIds)) highlight @endif
                                                    @if($pls->source === 'observation' && in_array($pls->id, $observationIds)) highlight @endif
           
    
                                                    @if($pls->source === 'place') bg-[#1976d2] @else bg-[#ffa726] @endif p-[20px]">
                                                    @if ($pls->source === 'place')
                                                        <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                                                    @else
                                                        <div class="flex items-center justify-center w-7">
                                                            <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                                class="-mr-1 w-7 h-7"> <img
                                                                src="{{ asset('new_img/happy.png') }}" alt=""
                                                                class="-ml-1 w-7 h-7">
                                                        </div>
                                                    @endif
                                                </label>
                                                <span
                                                    class="mt-2 text-black">{{ $pls->name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
    
                                </div>
                            </div>
    
                        </div>
    
    
                        <div class="flex flex-row justify-center items-center gap-4 mt-8">
                            <a href="/" class="px-6 py-4 font-bold	font-sm rounded-3xl color-site border-2 border-site cursor-pointer">Close</a>
    
                            
                            <button type="submit" class="px-6 py-4 font-bold border-2	font-sm rounded-3xl text-white bg-site border-site">Update Map</button>
                        </div>
                    </from>

                 


                </div>

            </div>

            {{-- <div class="" x-show="update == 'open'">
                <div class="flex items-center justify-center mt-6">
                    <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="observation()">
                        <div class="flex flex-col">

                            <div class="flex items-center justify-center bg-black border-2 border-white rounded-full shadow-xl"
                                :class="tab == 'place' || tab == 'observation1' ? 'z-10 p-[35px]' :
                                    'p-[35px] bg-black/50'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>


                            </div>
                        </div>
                    </div>
                    <div class="-ml-2 cursor-pointer" @click="tab='observation'" onclick="observation()">
                        <div class="flex flex-col">

                            <div class="flex items-center justify-center bg-blue-400 border-2 border-white rounded-full shadow-xl"
                                :class="tab == 'observation' ? 'z-10 p-[35px]' :
                                    'p-[35px] bg-blue-400/50'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col items-center justify-center px-6 py-6" x-show="tab=='place'">
                    <span class="my-3 text-xl italic font-bold">
                        Update your City Layers!
                    </span>
                    <input type="text" class="w-full px-2 py-2 mb-6 bg-gray-200 rounded-full" wire:model='search'
                        placeholder="Browse and remove city layers" name="input" id="">

                    <div class="flex gap-8">
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-white p-[35px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>

                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-red-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">PLace 1</span>
                        </div>
                    </div>
                    <div class="flex gap-8">
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-red-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Place 1</span>
                        </div>
                    </div>


                </div>

                <div class="flex flex-col items-center justify-center px-6 py-6" x-show="tab=='observation'">
                    <span class="my-3 text-xl italic font-bold">
                        Update your City Layers!
                    </span>
                    <input type="text" class="w-full px-2 py-2 mb-6 bg-gray-200 rounded-full" wire:model='search'
                        placeholder="Browse and add city layers" name="input" id="">

                    <div class="flex gap-8">
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>

                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">PLace 1</span>
                        </div>
                    </div>
                    <div class="flex gap-8">
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Obser 1</span>
                        </div>
                        <div class="flex flex-col items-center justify-center w-[80px]">

                            <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>

                            </div>
                            <span class="mt-2 text-black">Place 1</span>
                        </div>
                    </div>


                </div>


                <div class="mt-8">
                    <div class="absolute left-0 right-0 bottom-4">
                        <div class="flex items-center justify-center gap-2">
                            <button class="px-8 py-4 border-4 border-blue-500 rounded-3xl">
                                <span class="text-xl font-semibold text-blue-500">
                                    Save and Close
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
            </div> --}}



        </div>
    </div>
</div>
<style>
    .highlight {
        border: 4px solid limegreen;
    }
</style>
<script>
    function toggleClass(id) {
        document.getElementById('PL_' + id).classList.toggle('highlight');
    }

    function noti() {
        // swal({
        //     icon: "success",
        //     title: 'Map updated successfully',

        // })

        // window.location.href = "/";

    }
</script>
