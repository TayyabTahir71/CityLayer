 @extends('layouts.app')

 @section('main')
     <div data-barba="container" class="">
         <div class="flex flex-col items-center p-8 mx-auto">
             <label for="dropzone-file" class="flex flex-col justify-center w-5/6 pt-[10%]">
                 <div class="flex flex-col items-center justify-center pb-6">
                     <h1 class="text-4xl font-bold text-center text-gray-900">{{ __('messages.welcome to') }}<br> City
                         Layers!
                     </h1>
                     <p class="mt-2 text-base text-center text-gray-600">
                         {{ __('messages.A network for people who care about their environment!') }} </p>
                 </div>
             </label>
         </div>
         <div class="flex flex-col items-center justify-center bg-gray-300">
               <a href="about"><h1 class="py-4 text-xl text-center text-black active:text-blue-600"> Introducing City Layers </h1></a>
             <a href="award"><h1 class="py-4 text-xl text-center text-black active:text-blue-600"> Citizen Science Award 2023 –<br> Participate and Win! </h1></a>
            <a href="research"><h1 class="py-4 text-xl text-center text-black active:text-blue-600"> City Layers research overview</h1></a>
             <a href="team"> <h1 class="py-4 text-xl text-center text-black active:text-blue-600"> Project team</h1></a>
            <a href="contact"> <h1 class="py-4 text-xl text-center text-black active:text-blue-600"> Contact</h1></a>
            <a href="impressum"> <h1 class="pt-4 pb-12 text-xl text-center text-black active:text-blue-600"> Impressum</h1></a>

         </div>
         <div class="fixed bottom-0 left-0 right-0 text-white bg-gray-300">
             <div class="flex justify-center pt-4 pb-4 mx-4 text-sm font-bold text-center">
                 <a href="/">
                     <h1 class="text-3xl text-center text-black">{{ __('messages.Back') }}</h1>
                 </a>
             </div>
         </div>
     </div>
 @endsection
