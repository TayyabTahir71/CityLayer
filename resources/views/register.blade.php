@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <div class="flex flex-col items-center h-screen p-4 mx-auto">

            <label for="dropzone-file" class="flex flex-col justify-center w-5/6 pt-[10%]">
                <div class="flex flex-col items-center justify-center">
                    <h1 class="pb-4 text-3xl font-extrabold text-center text-gray-900">{{ __('messages.welcome to') }}<br>
                        CITY LAYERS!</h1>
                    <h1 class="pb-4 text-3xl font-bold text-center text-gray-900">{{ __('messages.Registration') }}</h1>
                </div>
            </label>

            <form class="w-1/2 md:w-1/3 lg:w-1/4" role="form" method="POST"
                action="{{ route('backpack.auth.register') }}">
                {!! csrf_field() !!}
                <div class="mb-6">
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-800">{{ __('messages.Username') }}</label>
                    <input type="text" name="name" id="name" placeholder="Username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>

                {{-- <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        placeholder="name@mail.com">
                </div> --}}
                <div class="mb-3">
                    <label for="password"
                        class="block mb-1 text-sm font-medium text-gray-800">{{ __('messages.Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-800">{{ __('messages.Confirm password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">{{ __('messages.register') }}</button>
                </div>
            </form>

            <div class="pt-2 text-sm text-center text-gray-800">{{ __('messages.Already an account!') }}</div>
            <div class="text-center text-gray-800 hover:text-gray-600 pt-2 font-bold"><a
                    href="login">{{ __('messages.login') }}</a></div>

                       @php $locale = session()->get('locale'); @endphp
  
        <div class="flex justify-center pt-4">
            <a class="mx-2" href="lang/en"><img src="{{ asset('img/flag/England.png') }}" width="25px"></a>
            <a class="mx-2" href="lang/de"><img src="{{ asset('img/flag/Germany.png') }}" width="25px"></a>
        </div>
          <div class="flex justify-between mx-4 font-bold pt-8 text-center underline">
          <a href="award">
            Citizen Science Award 2023<br>participate and win!
            </a>
            </div>
        </div>
        
   <div class="fixed bottom-0 right-0 left-0 bg-black text-white">
                <div class="flex justify-between mx-4 text-sm font-bold pt-4 pb-4 text-center">
            <a href="about">
            {{ __('messages.Mapping') }}<br>{{ __('messages.tool') }}
            </a>
             <a href="research">
            {{ __('messages.research') }}<br>{{ __('messages.overview') }} 
            </a>
             <a href="team">
            {{ __('messages.Project team') }}<br>{{ __('messages.& partners') }}
            </a>
             <a href="contact">
            {{ __('messages.Contact') }}<br>{{ __('messages.us') }}
            </a>
            </div>
        </div>
    </div>
@endsection
