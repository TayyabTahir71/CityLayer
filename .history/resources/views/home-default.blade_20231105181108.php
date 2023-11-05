@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">

        <div class="flex flex-col items-center justify-center mt-8">

            <section class="flex flex-col items-center justify-center text-gray-900">
                <img src="{{asset('images/logo.svg')}}" alt="" class="w-[100px] h-[100px] bg-no-repeat bg-cover">
                <div class="flex flex-col items-center justify-center mt-2 text-2xl italic font-extrabold">
                    <span>Introducing</span>
                    <span class="uppercase">City Layers!</span>
                </div>
            </section>



            <section class="">


                


            </section>


            {{-- <p class="mt-4 text-center px-7">
                By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and <span
                    class="text-blue-500">Terms of Service.</span>
            </p> --}}

        </div>


    </div>
@endsection
@push('scripts')
    <script>
        $('.mysilder').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,

        });
    </script>
@endpush
