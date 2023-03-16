@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col items-center justify-center h-screen p-8 mx-auto bg-gray-900">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-2/3 mb-8 border-2 border-dashed rounded-lg">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <i class="pb-4 mr-3 fa-regular fa-map"></i>
                    <h1 class="text-base font-bold text-gray-100">Welcome to the<br> City Layer App</h1>
                </div>

            </label>


            <section class="flex flex-col justify-center">
                <div class="flex justify-center">
                    <a href="login" class="py-4">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Sign in</button>
                    </a>
                </div>
                <div class="flex justify-center">
                    <a href="register">
                        <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            My first time here</button>
                    </a>
                </div>
            </section>
        </div>
    </div>
@endsection
