@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col items-center h-screen p-8 mx-auto">
            <label for="dropzone-file"
                class="flex flex-col justify-center w-5/6 mb-8">
                <div class="flex flex-col items-center justify-center pt-16 pb-6">
                    <h1 class="text-3xl font-bold text-center text-gray-900">welcome to<br> CITY LAYERS!</h1>
                    <p class="mt-8 text-base text-center text-gray-600">A network for people who care about their environment! </p>
                    <p class="mt-8 text-base font-extrabold text-center text-gray-900">Earn points by exploring your surroundings and share your experiences with others!</p>
                </div>
            </label>


            <section class="flex flex-col justify-center">
                <div class="flex justify-center">
                    <a href="login" class="py-4">
                        <button class="px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">
                            Sign in</button>
                    </a>
                </div>
                <div class="flex justify-center">
                    <a href="register">
                        <button class="px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-800">
                            My first time here</button>
                    </a>
                </div>
            </section>
            <div class="fixed bottom-0 right-0 m-4">
          <a href="about"> <i class="text-gray-900 fa-solid fa-circle-info fa-2x"></i></a>
           </div>
        </div>
    </div>
@endsection
