@extends('layouts.app')

@section('main')
    <div class="absolute top-2 bg-blue-400 w-full flex flex-col mt-20">

        <div class="px-4 py-4 flex justify-start items-center gap-4 -mb-10">
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-blue-500 border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <img src="{{ asset('img/cam.PNG') }}" alt="" class="w-6 h-6 mt-4">
            <span class="text-lg font-extrabold text-white mt-4 italic">Park</span>
        </div>
        <div class="px-4 py-2 flex justify-start items-center gap-4">
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-yellow-300 border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-6 h-6 mt-4">
            <span class="text-lg font-extrabold text-white mt-4 italic">Happy</span>
        </div>

        <div class="mt-1 pl-24 mbp pr-4 font-semibold italic text-white">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam ipsam
            quidem dolore deleniti praesentium, culpa
        </div>

        <span class="mt-4 flex justify-end items-end px-2 font-semibold italic text-white">
            added by john wick
        </span>
    </div>
@endsection
