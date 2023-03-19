@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <div class="flex flex-col items-center justify-center h-screen p-8 mx-auto">
            <a href="#" class="flex items-center pb-8">
                <i class="mr-3 fa-regular fa-map"></i>
                <span class="self-center text-xl font-semibold text-white whitespace-nowrap">City Layer</span>
            </a>
            <form class="w-1/2 md:w-1/3 lg:w-1/4" role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                {!! csrf_field() !!}

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-white">Your
                        email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@mail.com" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-white">Your
                        password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-mediumtext-gray-300">Remember
                        me</label>
                </div>
                        <div class="flex justify-center">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
           </div>
            </form>
            <div class="pt-8 text-sm text-center text-blue-400 hover:text-blue-600"><a
                    href="{{ route('backpack.auth.password.reset') }}"
                    class="prevent">{{ trans('backpack::base.forgot_your_password') }}</a>
            </div>
            <div class="text-sm text-center text-blue-400 hover:text-blue-600"><a href="register">register</a></div>
        </div>
    </div>
@endsection
