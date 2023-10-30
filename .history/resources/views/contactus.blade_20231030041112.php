@extends('layouts.app')

@section('main')
    {!! RecaptchaV3::initJs() !!}
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>

        <div class="flex flex-col w-full mt-8 mb-4 text-center">
            <h1 class="mb-2 text-3xl font-extrabold text-black md:text-5xl title-font">{{ __('Team & Contact') }}</h1>
        </div>
        <div class="mx-auto md:w-2/4">
{{--            <form class="flex flex-col justify-center mx-4" method="post" action="contactmail">--}}
{{--                @csrf--}}
{{--                <div class="w-3/4 p-2 mx-auto">--}}
{{--                   --}}
{{--                        <label for="name" class="text-sm leading-7 text-gray-800">{{ __('messages.institution or name of participants') }}</label>--}}
{{--                        <input type="text" id="name" name="name" required--}}
{{--                            class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">--}}
{{--               --}}
{{--                </div>--}}
{{--                <div class="w-3/4 p-2 mx-auto">--}}
{{--                   --}}
{{--                        <label for="email" class="text-sm leading-7 text-gray-800">{{ __('messages.Email') }}</label>--}}
{{--                        <input type="email" id="email" name="email" required--}}
{{--                            class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">--}}
{{--                   --}}
{{--                </div>--}}
{{--                <div class="w-3/4 p-2 mx-auto">--}}
{{--                        <label for="message" class="text-sm leading-7 text-gray-800">{{ __('messages.Message') }}</label>--}}
{{--                        <textarea name="message"--}}
{{--                            class="w-full h-32 px-3 py-1 text-base leading-6 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none resize-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"--}}
{{--                            required></textarea>--}}
{{--                   --}}
{{--                </div>--}}
{{--                <div class="flex justify-center w-full p-2">--}}
{{--                    <button type="submit"--}}
{{--                        class="relative flex max-w-[200px] px-5 py-4 my-2 text-center mt-2 font-bold text-white bg-black shadow-lg prevent lg:ml-8 group rounded-xl hover:bg-gray-800">{{ __('messages.Send message') }}</button>--}}
{{--                </div>--}}
{{--                <div class="w-3/4 p-2 pt-8 mt-8">--}}
{{--                    {!! RecaptchaV3::field('register') !!}--}}
{{--                    @if ($errors->has('g-recaptcha-response'))--}}
{{--                        <span class="help-block">--}}
{{--                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
{{--                        </span>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </form>--}}

<p class="mt-2 text-base text-center text-black italic pt-[30px] pb-[30px] font-bold">
    The project is based at the Department of Visual Culture, School of Architecture and Planning,
Technische Universitat Wien(Link:<a class="text-[#2d9bf0] underline">https://visualculture.tuwein.ac.at</a>).
</p>
<div class="text-center flex items-center justify-center" >
    <img src="./images/TU_Logo_RGB.svg" alt="not found" class="pb-[20px] h-[200px] flex items-center justify-content-center" >

</div>
            <p class="mt-2 text-base  text-black italic text-center  font-bold">Our multidisciplinary team consist of:</p>
            <p class="mt-2 text-base  text-black italic text-center "><span class="font-bold">Lovro Koncar-Gamulin,</span>lead researcher and author of the "City Layers" mapping tool</p>
            <p class="mt-2 text-base  text-black italic text-center "><span class="font-bold">Peter MortenBock,</span>project director of "platFORMed city",base project of "City Layers: Citizen
                Mapping as a Practice of City-Making
                "</p>
            <p class="mt-2 text-base  text-black italic  text-center"><span class="font-bold">Angelos Chronis,</span>app implementation and UX advisor</p>
            <p class="mt-2 text-base  text-black italic text-center "><span class="font-bold">Firas Safieddine,</span>app development lead</p>
            <p class="mt-2 text-base  text-black italic  text-center"><span class="font-bold">Honorata Grzesikowska,</span>urbanist</p>
            <p class="mt-2 text-base  text-black italic text-center "><span class="font-bold">Andronika Pappa,</span>researcher</p>
            <p class="mt-2 text-base  text-black italic  text-center"><span class="font-bold">Evelina Jaskulska,</span>researcher</p>
            <p class="mt-2 text-base  text-black italic text-center "><span class="font-bold">Carmen Lael Hines,</span>researcher and outreach expert</p>
            <p class="mt-2 text-base  text-black italic  text-center"><span class="font-bold">Bilal Alame,</span>researcher assistant</p>


            <p class="mt-2 text-base  text-black italic text-center  ">Partner institutions and organizations</p>
            <div class="flex justify-center">
                <div class="flex flex-col gap-[2rem] p-[20px]">
                    <img src="./images/fwf-logo_var2.jpeg" alt="not found" class="h-[200px]">
                    <div class="font-bold">Der wissenchaftsfonds</div>
                </div>
                <div class="flex flex-col justify-center gap-[2rem]">
                    <img src="./images/OeAD_LogoUnterzeile_DE_RGB.png" alt="not found" class="h-[200px]">
                    <div class="font-bold">OAD-Agentur fur Bildung und Internationalisierng</div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex flex-col  gap-[2rem] p-[20px]">
                    <img src="./images/II=_LOGO.png" alt="not found" class="h-[200px]">
                    <div class="font-bold">Osterreich forscht Platform</div>
                </div>
                <div class="flex flex-col items-center justify-center gap-[2rem]">
                    <img  src="./images/WIENXTRA LOGO.jpeg" alt="not found" class="h-[200px]">
                    <div class="font-bold">WIENXTRA</div>
                </div>
            </div>

            <p class="mt-2 text-base  text-black italic font-bold pt-[30px] text-center">Contact us!</p>
            <p class="mt-2 text-base  text-black italic text-center  ">If you have any questions about the project or the City Layers Web-App contact us at
            <a class="underline italic text-[#2d9bf0] text-center">info@citylayers.org</a></p>
        </div>

    </div>
@endsection
