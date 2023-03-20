@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <div class="flex flex-col items-center h-screen p-8 mx-auto">

                 <label for="dropzone-file" class="flex flex-col justify-center w-5/6 pt-8">
                <div class="flex flex-col items-center justify-center pt-4">
                <h1 class="pb-8 text-3xl font-extrabold text-center text-gray-900">welcome to<br> CITY LAYERS!</h1>
                    <h1 class="pb-8 text-3xl font-bold text-center text-gray-900">Registration</h1>
                </div>
            </label>
   
            <form class="w-1/2 md:w-1/3 lg:w-1/4" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                {!! csrf_field() !!}
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-800">Username</label>
                    <input type="text" name="name" id="name" placeholder="Username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                      required>
                </div>

                {{-- <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-800">Email</label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        placeholder="name@mail.com">
                </div> --}}
                <div class="mb-3">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-800">Password</label>
                    <input type="password" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-800">Confirm
                        password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-800 dark:focus:ring-gray-500 dark:focus:border-gray-500"
                        required>
                </div>

               <div class="flex justify-center">
                <button type="submit"
                    class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Register</button>
            </div>
            </form>
           
            <div class="pt-8 text-sm text-center text-gray-800">Already an account!</div>
            <div class="text-sm text-center text-gray-800 hover:text-gray-600"><a href="login">Login</a></div>
             <div class="fixed bottom-0 right-0 m-4">
          <a href="about"> <i class="text-gray-900 fa-solid fa-circle-info fa-2x"></i></a>
           </div>
        </div>
    </div>
@endsection
