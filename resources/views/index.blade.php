@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col items-center justify-center h-screen p-8 mx-auto bg-gray-900">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-1/3 mb-8 border-2 border-dashed rounded-lg">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <h1 class="text-base font-medium text-gray-100">Welcome to the<br> City Layer App</h1>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>


            <section class="flex flex-col">
               
                    <a href="login" class="py-4">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Sign in</button>
                    </a>
                         <a href="register">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            My first time here</button>
                    </a>
    
            </section>
        </div>
        <a href="admin/logout"
            class="block px-4 py-3 text-sm font-bold text-gray-300 capitalize transition-colors duration-300 transform hover:bg-gray-700 hover:text-white prevent">
            Déconnexion </a>
    </div>
@endsection
