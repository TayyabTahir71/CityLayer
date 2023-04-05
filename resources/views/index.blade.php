@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">
        <div class="flex flex-col items-center p-8 mx-auto h-screen">
            <label for="dropzone-file" class="flex flex-col justify-center w-5/6 pt-[10%]">
                <div class="flex flex-col items-center justify-center pb-6">
                    <h1 class="text-3xl font-bold text-center text-gray-900">{{ __('messages.welcome to') }}<br> CITY LAYERS!
                    </h1>
                    <p class="mt-8 text-base text-center text-gray-600">
                        {{ __('messages.A network for people who care about their environment!') }} </p>
                    <p class="mt-4 text-base font-extrabold text-center text-gray-900">
                        {{ __('messages.Earn points by exploring your surroundings and share your experiences with others!') }}
                    </p>
                </div>
            </label>


            <section class="flex flex-col justify-center">
                <div class="flex justify-center">
                    <a href="login" class="py-4">
                        <button
                            class="px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">{{ __('messages.Sign in') }}</button>
                    </a>
                </div>
                <div class="flex justify-center">
                    <a href="register">
                        <button
                            class="px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">{{ __('messages. My first time here') }}</button>
                    </a>
                </div>
                       @php $locale = session()->get('locale'); @endphp
  
        <div class="flex justify-center pt-8">
            <a class="mx-2" href="lang/en"><img src="{{ asset('img/flag/England.png') }}" width="25px"></a>
            <a class="mx-2" href="lang/de"><img src="{{ asset('img/flag/Germany.png') }}" width="25px"></a>
        </div>

            </section>

         <div class="flex justify-between mx-4 font-bold pt-4 text-center underline">
          <a href="award">
            Citizen Science Award 2023<br>participate and win!
            </a>
            </div>
        </div>
        
   <div class="fixed bottom-0 right-0 left-0 bg-black text-white">
            <div class="flex justify-between mx-4 text-sm font-bold pt-4 pb-4 text-center">
            <a href="about">
            Mapping<br>tool
            </a>
             <a href="research">
            research<br>overview 
            </a>
             <a href="team">
            Project team<br> & partners
            </a>
             <a href="contact">
            Contact<br>us
            </a>
            </div>
        </div>
    </div>
@endsection
