@extends('layouts.app')

@section('main')
<div data-barba="container" class="relative h-screen">
     <div class="flex flex-col items-center justify-center h-screen p-8 mx-auto bg-gray-900">

            <form class="w-1/2 md:w-1/3 lg:w-1/4" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                {!! csrf_field() !!}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium :text-white">Username</label>
                    <input type="text" name="name" id="name" placeholder="Username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium :text-white">Your
                        email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@flowbite.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block mb-1 text-sm font-medium text-white">Your
                        password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
             
             <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-white">Confirm
                        password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>

             
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            </form>
            <div class="pt-8 text-sm text-center">Already an account!</div>
            <div class="text-sm text-center text-blue-400 hover:text-blue-600"><a href="login">Login</a></div>
        </div>
</div>
@endsection