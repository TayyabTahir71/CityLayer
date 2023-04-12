@extends('layouts.app')

@section('main')
    {!! RecaptchaV3::initJs() !!}
    <div data-barba="container" class="">
        <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>

        <div class="flex flex-col w-full mt-24 mb-4 text-center">
            <h1 class="mb-2 text-3xl font-medium text-black md:text-5xl title-font">Contact Us</h1>
        </div>
        <div class="mx-auto">
            <form class="flex flex-col justify-center mx-4" method="post" action="contactmail">
                @csrf
                <div class="w-2/3 p-2 mx-auto">
                   
                        <label for="name" class="text-sm leading-7 text-gray-800">institution or name of participants</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
               
                </div>
                <div class="w-2/3 p-2 mx-auto">
                   
                        <label for="email" class="text-sm leading-7 text-gray-800">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                   
                </div>
                <div class="w-2/3 p-2 mx-auto">
                        <label for="message" class="text-sm leading-7 text-gray-800">Message</label>
                        <textarea name="message"
                            class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"
                            required></textarea>
                   
                </div>
                <div class="flex justify-center w-full p-2">
                    <button type="submit"
                        class="relative flex max-w-[200px] px-5 py-4 my-2 text-center mt-2 font-bold text-white bg-black shadow-lg prevent lg:ml-8 group rounded-xl hover:bg-gray-800">Send
                        message</button>
                </div>
                <div class="w-full p-2 pt-8 mt-8">
                    {!! RecaptchaV3::field('register') !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>

    </div>
@endsection
