@extends('layouts.app')

@section('main')
    <div data-barba="container" class="">

        <div class="flex flex-col items-center justify-center mt-14">

            <section class="flex flex-col items-center justify-center text-gray-900">

                <img src="" alt="" class="w-12 h-12 bg-no-repeat bg-cover">


                <div class="flex flex-col items-center justify-center mt-4 text-2xl italic font-extrabold">

                    <span>Introducing</span>
                    <span class="uppercase">City Layers!</span>


                </div>

            </section>

            <section class="">
                <div class="px-8 mt-16">
                    <div class="max-h-full lg:w-[1400px] md:w-[900px] px-12  w-[400px]">
                        <div class="w-full mysilder flex justify-center items-center gap-2">

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]   h-[330px] rounded"
                                    src="https://th.bing.com/th/id/R.869c978552ff253563b883e6f808f066?rik=%2b%2biVFdvlc%2fkfYA&riu=http%3a%2f%2fwww.hdwallpaper.nu%2fwp-content%2fuploads%2f2015%2f07%2f869c978552ff253563b883e6f808f066.jpg&ehk=rx%2f8Q%2fTPfE4eCNXaCEJ6y545Lj0ny4UsXQJOqgvvEv8%3d&risl=&pid=ImgRaw&r=0"
                                    alt="">
                            </div>

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]  h-[330px] rounded"
                                    src="https://th.bing.com/th/id/OIP.lXZVTGEcspIyDeXYxUiojQHaE7?pid=ImgDet&rs=1"
                                    alt="">
                            </div>


                        </div>

                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </section>




            <section class="">


                <form role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                    {!! csrf_field() !!}
                    <div class="flex flex-col items-center justify-center gap-4 mt-12">
                        <input type="text" placeholder="Username" name="name" id="name" class="form-input"
                            required />
                        @if ($errors->has('name'))
                            <span class="text-red-500">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="password" placeholder="Password" name="password" id="password" class="form-input"
                            required />
                        @if ($errors->has('password'))
                            <span class="text-red-500">{{ $errors->first('password') }}</span>
                        @endif
                        <input type="password" placeholder="Confirm Password" name="password_confirmation"
                            id="password_confirmation" class="form-input" required />

                        @if ($errors->has('password_confirmation'))
                            <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
                        @endif

                        <button type="submit" class="mb-3 cursor-pointer btn btn-primary">
                            <div class="text-center"> Signup</div>

                        </button>
                    </div>


                </form>


            </section>


            {{-- <p class="mt-4 text-center px-7">
            By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and <span class="text-blue-500">Terms of Service.</span>
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
