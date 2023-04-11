 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         @include('parts.navbar')
         <div class="flex flex-col h-screen mx-auto">
             <div class="flex flex-col items-center pt-24 gap-x-6 lg:pt-32">
                 <form action="avatar" method="POST" enctype="multipart/form-data">
                     @csrf
                     <input type="file" name="image" id="image" class="hidden" accept="image/*"
                         onchange="javascript:this.form.submit();">
                     <label for="image" class="cursor-pointer">
                         <img class="object-cover w-24 h-24 rounded-full ring ring-gray-300 dark:ring-gray-600"
                             src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                     </label>
                 </form>
             </div>
             <h1 class="pt-4 text-2xl text-center text-gray-800">{{ $name }}</h1>
                <h1 class="pt-4 text-2xl text-center text-gray-800">{{  backpack_auth()->user()->email }}</h1>
             <h2 class="pt-2 text-2xl font-bold text-center text-yellow-300">{{ backpack_auth()->user()->score }}</h2>
             <div class="w-1/2 mx-auto">
                 <div class="relative pt-1">
                     <div class="flex h-3 overflow-hidden text-xs bg-white border rounded">
                         @php $score = backpack_auth()->user()->score / 10; @endphp
                         <div style="width:{{ $score }}%"
                             class="flex flex-col justify-center text-center text-white bg-yellow-300 shadow-none whitespace-nowrap">
                         </div>
                     </div>
                     <div class="pt-2">
                         @if (backpack_auth()->user()->score < 1000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 1</div>
                         @elseif(backpack_auth()->user()->score < 2000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 2</div>
                         @elseif(backpack_auth()->user()->score < 3000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 3</div>
                         @elseif(backpack_auth()->user()->score < 4000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 4</div>
                         @elseif(backpack_auth()->user()->score < 5000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 5</div>
                         @elseif(backpack_auth()->user()->score < 6000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 6</div>
                         @elseif(backpack_auth()->user()->score < 7000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 7</div>
                         @elseif(backpack_auth()->user()->score < 8000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 8</div>
                         @elseif(backpack_auth()->user()->score < 9000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 9</div>
                         @elseif(backpack_auth()->user()->score < 10000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 10</div>
                         @endif
                     </div>
                     <div class="flex justify-center pt-4">
                         <div class="flex gap-x-2">

                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if (backpack_auth()->user()->score > 1000)
                                  <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>
                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 2000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 3000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 4000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 4000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                            <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 4000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                             <div class="w-8 h-8 border-2 border-yellow-300 rounded-full">
                             @if(backpack_auth()->user()->score > 4000)
                                    <i class="px-3 py-4 fa-solid fa-trophy fa-2x"></i>
                                 @endif
                             </div>

                         </div>
                     </div>
                     <h1 class="pt-4 text-xl text-center text-gray-800">{{ $infos->profession }}</h1>
                 </div>
             </div>
             <div class="flex justify-center pt-4 mx-4">
             @php
              $preferences = explode(',', $infos->preferences);
               // remove all special characters but keep the spaces
                $preferences = preg_replace('/[^A-Za-z0-9 ]/', '', $preferences);
             
             @endphp
             @foreach ($preferences as $preference)
                   <div class="flex flex-col gap-y-2">
                     <h1 class="text-xs flex py-2 mx-2 px-2 text-center text-white bg-[#667DC7] rounded-lg">
                         {{ $preference }}</h1>
                 </div>
             @endforeach
               
             </div>
             <button
                 class="px-4 py-2 mx-auto mt-8 mb-8 text-center text-white bg-green-400 rounded-full hover:bg-green-300 active:bg-green-800">
                 <a href="/edit_profile">{{ __('messages.Edit Profile') }}</a>
             </button>
         </div>
     </div>
 @endsection
