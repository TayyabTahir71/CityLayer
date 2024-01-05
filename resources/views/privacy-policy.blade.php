@extends('layouts.app')

@section('main')
    {!! RecaptchaV3::initJs() !!}
    <div data-barba="container" class="">
        <a href="/" class="prevent"> <i class="mt-4 ml-4 text-2xl text-gray-900 fas fa-close"></i></a>

        <div class="flex flex-col w-full mt-8 mb-4 text-center">
            <h1 class="mb-2 text-3xl font-extrabold text-black md:text-5xl title-font">{{ __('PRIVACY POLICY AND') }}</h1>
            <h1 class="mb-2 text-3xl font-extrabold text-black md:text-5xl title-font">{{ __('TERMS OF SERVICE') }}</h1>
        </div>
        <div class="mx-auto px-[50px]">


            <p class="mt-2 text-base  text-black italic  ">
              Privacy policy: TU Wien's data protection declaration for websites:<a class="underline italic text-[#2d9bf0]">https://visualculture.tuwein.ac.at</a>).
            </p>
            <p class="mt-2 text-base  text-black italic font-extrabold text-3xl ">Terms of Service?</p>

        </div>

    </div>
@endsection
