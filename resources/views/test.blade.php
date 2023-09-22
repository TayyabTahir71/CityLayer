@extends('layouts.app')

@section('main')
    <div class="absolute top-2 bg-blue-400 w-1/3 flex flex-col py-14">
        <div class="px-4 py-4 flex justify-start items-center gap-2">
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-blue-500 border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <span class="text-lg font-extrabold text-white">ASBS</span>
        </div>
        <div class="px-4 py-4 flex justify-start items-center gap-2">
            <div class="flex flex-col items-center justify-center">
                <div class="rounded-full bg-yellow-500 border-2 border-white p-[35px]" x-on:click="tab='observation'">
                </div>
            </div>
            <span class="text-lg font-extrabold text-white">ASBS</span>
        </div>
    </div>
@endsection
