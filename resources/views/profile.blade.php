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
                         <img class="object-cover w-32 h-32 rounded-full ring ring-gray-300 dark:ring-gray-600"
                             src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                     </label>
                 </form>
             </div>
             <h1 class="pt-4 text-2xl text-center text-gray-800">{{ $name }}</h1>
                 <h2 class="pt-2 text-2xl font-bold text-center text-yellow-300">{{ $infos->score }}</h2>
             <div class="w-1/2 mx-auto">
                 <div class="relative pt-1">
                     <div class="flex h-3 overflow-hidden text-xs bg-white border rounded">
                         <div style="width:{{ $infos->score }}%"
                             class="flex flex-col justify-center text-center text-white bg-yellow-300 shadow-none whitespace-nowrap">
                         </div>
                     </div>
                     <div class="pt-2">
                         @if ($infos->score < 100)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 1</div>
                         @elseif($infos->score < 200)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 2</div>
                         @elseif($infos->score < 300)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 3</div>
                         @elseif($infos->score < 400)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 4</div>
                         @elseif($infos->score < 500)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 5</div>
                         @elseif($infos->score < 600)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 6</div>
                         @elseif($infos->score < 700)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 7</div>
                         @elseif($infos->score < 800)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 8</div>
                         @elseif($infos->score < 900)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 9</div>
                         @elseif($infos->score < 1000)
                             <div class="text-xs font-semibold text-center text-yellow-300">Level 10</div>
                         @endif
                     </div>
                     <div class="flex justify-center pt-4">
                         <div class="flex gap-x-2">
                             <div class="w-16 h-16 border-2 border-yellow-300 rounded-full"></div>
                             <div class="w-16 h-16 border-2 border-yellow-300 rounded-full"></div>
                             <div class="w-16 h-16 border-2 border-yellow-300 rounded-full"></div>
                             <div class="w-16 h-16 border-2 border-yellow-300 rounded-full"></div>
                         </div>
                     </div>
                     <h1 class="pt-4 text-2xl text-center text-gray-800">{{ $infos->profession }}</h1>
                 </div>
             </div>
             <div class="flex justify-center pt-4 mx-4">
                 <div class="flex flex-col gap-y-2">
                     <h1 class="text-xs py-2 mx-2 px-2 text-center text-white bg-[#667DC7] rounded-lg">
                         {{ $infos->relation }}</h1>
                     <h1 class="text-xs py-2 mx-2 px-2 text-center text-white bg-[#667DC7] rounded-lg">
                         {{ $infos->preferences }}</h1>
                 </div>
             </div>
             <button
                 class="px-4 py-2 mx-auto mt-8 text-xl font-bold text-center text-white bg-green-400 rounded-full hover:bg-green-300 active:bg-green-800">
                 <a href="/edit_profile">Edit Profile</a>
             </button>
         </div>
     </div>
 @endsection
