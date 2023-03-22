 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         @include('parts.navbar')
         <div class="flex flex-col h-screen mx-auto">
      <div class="p-3 pt-16 lg:mx-16 md:pt-20">
                 <div class="flex flex-row items-center pt-2">
                     <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>
                 </div>
     </div>
    </div>
 @endsection
