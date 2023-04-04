@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <div class="flex flex-col items-center h-screen p-8 mx-auto">
            <label for="dropzone-file" class="flex flex-col justify-center w-5/6 mb-4">
                <div class="flex flex-col items-center justify-center pt-16 pb-4">
                    <h1 class="text-3xl font-extrabold text-center text-gray-900"> {{ __('messages.welcome to') }}<br> CITY LAYERS!</h1>
                    <p class="mt-8 text-base text-center text-gray-600">{{ __('messages.A network for people who care about their environment!') }}</p>
                    <p class="mt-8 text-base font-extrabold text-center text-gray-900">{{ __('messages.Earn points by exploring your surroundings and share your experiences with others!') }}</p>
                </div>
            </label>
            <form class="w-1/2 md:w-1/3 lg:w-1/4" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">{{ __('messages.Username') }}</label>
                    <input type="name" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        placeholder="Username" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">{{ __('messages.Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-gray-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-400">{{ __('messages.Remember me') }}</label>
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">{{ __('messages.Submit') }}</button>
                </div>
            </form>
            <div class="text-sm text-center text-gray-400 hover:text-gray-600 pt-2"><a href="register">{{ __('messages.register') }}</a></div>
                       @php $locale = session()->get('locale'); @endphp
  
        <div class="flex justify-center pt-4">
            <a class="mx-2" href="lang/en"><img src="{{ asset('img/flag/England.png') }}" width="25px"></a>
            <a class="mx-2" href="lang/de"><img src="{{ asset('img/flag/Germany.png') }}" width="25px"></a>
        </div>
        </div>
        <div class="fixed bottom-0 right-0 m-4">
            <a href="about"> <i class="text-gray-900 fa-solid fa-circle-info fa-2x"></i></a>
        </div>
 

    </div>

@endsection
