<div>
    <div class="pt-24 relative" x-cloak x-data="{ tab: 'place' }">



        <div class="flex items-center justify-center mt-6">
            <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="place()">
                <div class="flex flex-col">
                    <div class="border-2 border-black rounded-full shadow-xl bg-cyan-500"
                        :class="tab == 'place' || tab == 'place1' ? 'bg-cyan-500 z-10 p-[22px]' :
                            'bg-cyan-500/70 p-[35px]'">
                        <img src="{{ asset('img/image.png') }}" class="w-7 h-7"
                            :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'" id="place"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="-ml-2 cursor-pointer" @click="tab='observation'" onclick="observation()">
                <div class="flex flex-col">

                    <div class="border-2 flex justify-center items-center border-black rounded-full shadow-xl"
                        :class="tab == 'observation' || tab == 'observation1' ? 'bg-yellow-300 z-10 p-[16px]' :
                            'bg-yellow-300/70 p-[35px]'">
                        <span class="w-10 h-10 flex justify-center items-center"
                            :class="tab == 'observation' || tab == 'observation1' ? 'block' : 'hidden'" id="observation"
                            alt="">🔍</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="px-6 pt-6 flex justify-center items-center flex-col" x-show="tab=='place' || tab== 'place1'">
            <input type="text" class="w-full px-2 py-2 bg-gray-200 rounded-full" wire:model='search'
                placeholder="What is this place?" name="input" id="">
            <span class="italic font-semibold mt-2">Add new place</span>
        </div>
        <div class="px-6 pt-6 flex justify-center items-center flex-col"
            x-show="tab=='observation' || tab=='observation1'">
            <input type="text" class="w-full px-2 py-2 bg-gray-200 rounded-full" wire:model='search' placeholder=""
                value="" name="input" id="">
            <span class="italic font-semibold mt-2">Choose tags or add a new obervation</span>
        </div>

        <div class="flex justify-center items-center pt-10 gap-2 italic font-semibold" x-show="tab=='observation1'">
            <div class="flex flex-col items-center justify-center">
                <a href="/all-places">
                    <div class="rounded-full bg-yellow-300 border-2  p-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor" class="w-6 h-6 font-bold text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Add new</span>
                </a>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-yellow-300 border-2  border-black p-[35px]">

                </div>
                <span class="mt-2 text-black">Obser 1</span>
            </div>

            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-yellow-300 border-2  border-black p-[35px]">

                </div>
                <span class="mt-2 text-black">Obser 2</span>
            </div>

            <div class="flex flex-col items-center justify-center">
                <a href="/all-places">
                    <div class="rounded-full border-yellow-300 border-2  p-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor" class="w-6 h-6 font-bold text-yellow-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">See more</span>
                </a>
            </div>





        </div>
        <div class="flex justify-center items-center pt-10 gap-2 italic font-semibold" x-show="tab=='place1'">
            <div class="flex flex-col items-center justify-center">
                <a href="/all-places">
                    <div class="rounded-full bg-blue-400 border-2  p-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor" class="w-6 h-6 font-bold text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Add new</span>
                </a>
            </div>
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-blue-400 border-2  border-black p-[35px]">

                </div>
                <span class="mt-2 text-black">Obser 1</span>
            </div>

            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-blue-400 border-2  border-black p-[35px]">

                </div>
                <span class="mt-2 text-black">Obser 2</span>
            </div>

            <div class="flex flex-col items-center justify-center">
                <a href="/all-places">
                    <div class="rounded-full border-blue-400 border-2  p-[22px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor" class="w-6 h-6 font-bold text-blue-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">See more</span>
                </a>
            </div>





        </div>

        <div class="flex justify-center items-center pt-28 gap-2 italic font-semibold" x-show="tab=='observation'">

            <div class="" @click="tab='place1'">
                <img class="w-16 h-16" src="{{ asset('img/comfortable.png') }}" alt="">
            </div>
            <div class="" @click="tab='place1'">
                <img class="w-16 h-16" src="{{ asset('img/confused.png') }}" alt="">
            </div>
            <div class="" @click="tab='place1'">
                <img class="w-16 h-16" src="{{ asset('img/sad.png') }}" alt="">
            </div>
            <div class="" @click="tab='place1'">
                <img class="w-16 h-16" src="{{ asset('img/happy.png') }}" alt="">
            </div>
            <div class="" @click="tab='place1'">
                <img class="w-16 h-16" src="{{ asset('img/disgusted.png') }}" alt="">
            </div>


        </div>


        <div class="fixed bottom-4 left-0 right-0" x-show="tab=='place' || tab=='place1'">
            <div class="flex justify-center items-center gap-2">
                <button class="py-4 px-8 border-4 border-blue-500 rounded-3xl">
                    <span class="font-semibold text-xl text-blue-500">
                        Cancel
                    </span>
                </button>
                <button @click="tab='observation1'" class="py-4 px-8 border-4 border-white bg-blue-500 rounded-3xl">
                    <span class="font-semibold text-xl text-white">
                        Submit
                    </span>
                </button>
            </div>
        </div>
        <div class="fixed bottom-4 left-0 right-0" x-show="tab=='observation' || tab=='observation1'">
            <div class="flex justify-center items-center gap-2">
                <button class="py-4 px-8 border-4 border-blue-500 rounded-3xl">
                    <span class="font-semibold text-xl text-blue-500">
                        Cancel
                    </span>
                </button>
                <button class="py-4 px-8 border-4 border-white bg-blue-500 rounded-3xl">
                    <span class="font-semibold text-xl text-white">
                        Submit
                    </span>
                </button>
            </div>
        </div>
    </div>

</div>
