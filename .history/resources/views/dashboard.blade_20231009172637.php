@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label for="image" class="relative">
                <img class="object-cover rounded-full avatar_image"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                
            </label>
            <div class="flex-r pt-4">
                <div class="bl">Dashboard</div>
               
            </div>
        </div>

        <div class="grid grid-cols-1">
            <div class="">
                @include('item_dashboard')

                {{-- <div class="belo m-4">
                    @if ($usersWithTotals->hasMorePages())
                        <div class="first load-more-button cursor-pointer" data-page="{{ $usersWithTotals->currentPage() + 1 }}">see <div class="plu">+</div> all</div>
                    @endif
                    <a href="/" class="scnd mt-2">Back</a>
                </div> --}}
            </div>
        </div>

        
    </div>
   
@endsection
