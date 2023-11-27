@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">
        <div class="px-3 pt-2">
            <a href="/" class="">
                <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

            </a>
        </div>

        <div class="flex flex-col items-center justify-center mt-8">

            <section class="flex flex-col items-center justify-center text-gray-900">
                <img src="{{ asset('images/logo.svg') }}" alt="" class="w-[100px] h-[100px] bg-no-repeat bg-cover">
                <div class="flex flex-col items-center justify-center mt-2 text-2xl italic font-extrabold">
                    <span>Introducing</span>
                    <span class="uppercase">City Layers!</span>
                </div>
            </section>



            <section class="">


                <p class="md:w-[400px] px-5 text-justify my-5">
                    <b>Welcome to City Layers - a digitised participatory tool for urban design.</b> The project proposes a
                    critical and contemporary city-making technology focused on contributing to more egalitarian approaches
                    to urban planning. This app has been developed in collaboration with students, citizens and researchers
                    all interested in democratising and diversifying how cities are formed.
                    Inside City Layers, feel free to use tags, textual comments, photographs, suggestions and votes to
                    articulate your views on a particular urban surrounding. These impressions can include material and
                    immaterial 'layers' of the city, from physical places, to observations, demands and responses. City
                    layers can be added, depending on the phenomena needed and detected by the user. Any user can share
                    personal reflections and thoughts on their desired city forms, and map the urban fabric depending on
                    particular needs.
                    Citizens can add thoughts on how urban places can be improved, or they can immerse themselves in the
                    information on their urban surroundings mapped by others.
                    City Layers seeks to empower citizen engagement to tackle spatial, social and environmental asymmetries
                    and inequalities - increasingly reinforced through city-data processing and urban design. This city
                    mapping app serves as a means of communication between cities and their citizens, generating a
                    contemporary, critical form of data that is collectively generated, managed and cared for.
                </p>


            </section>


            {{-- <p class="mt-4 text-center px-7">
                By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and <span
                    class="text-blue-500">Terms of Service.</span>
            </p> --}}

        </div>


    </div>
@endsection
