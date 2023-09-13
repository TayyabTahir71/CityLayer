@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div class="pt-24" x-cloak x-data="{ tab: 'place' }">



        <div class="flex items-center justify-center mt-6">
            <div class="-mr-2 cursor-pointer" @click="tab='place'" onclick="observation()">
                <div class="flex flex-col">

                    <div class="border-2 flex justify-center items-center bg-black border-white rounded-full shadow-xl"
                        :class="tab == 'place' || tab == 'observation1' ? 'z-10 p-[35px]' :
                            'p-[35px] bg-black/50'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>


                    </div>
                </div>
            </div>
            <div class="-ml-2 cursor-pointer" @click="tab='observation'" onclick="observation()">
                <div class="flex flex-col">

                    <div class="border-2 flex justify-center items-center border-white  bg-blue-400 rounded-full shadow-xl"
                        :class="tab == 'observation' ? 'z-10 p-[35px]' :
                            'p-[35px] bg-blue-400/50'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                </div>
            </div>
        </div>


        <div class="px-6 py-6 flex justify-center items-center flex-col" x-show="tab=='place'">
            <input type="text" class="w-full px-2 mb-6 py-2 bg-gray-200 rounded-full" wire:model='search'
                placeholder="Browse and remove city layers" name="input" id="">

            <div class="flex gap-8">
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>

                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">PLace 1</span>
                </div>
            </div>
            <div class="flex gap-8">
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-red-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Place 1</span>
                </div>
            </div>


        </div>

        <div class="px-6 py-6 flex justify-center items-center flex-col" x-show="tab=='observation'">
            <input type="text" class="w-full px-2 mb-6 py-2 bg-gray-200 rounded-full" wire:model='search'
                placeholder="Browse and add city layers" name="input" id="">

            <div class="flex gap-8">
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>

                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">PLace 1</span>
                </div>
            </div>
            <div class="flex gap-8">
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-yellow-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Obser 1</span>
                </div>
                <div class="flex flex-col items-center justify-center w-[80px]">

                    <div class="rounded-full bg-blue-300 border-4  border-lime-500 p-[24px]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </div>
                    <span class="mt-2 text-black">Place 1</span>
                </div>
            </div>


        </div>


        <div class="mt-8">
            <div class="absolute bottom-4 left-0 right-0">
                <div class="flex justify-center items-center gap-2">
                    <button class="py-4 px-8 border-4 border-blue-500 rounded-3xl">
                        <span class="font-semibold text-xl text-blue-500">
                            Save and Update
                        </span>
                    </button>

                </div>
            </div>
        </div>



    </div>
@endsection
