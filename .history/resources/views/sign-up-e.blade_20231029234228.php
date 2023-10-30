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
                <div class="px-8 mt-8">
                    <div class="max-h-full lg:w-[1400px] md:w-[900px] px-12  w-[400px]">
                        <div class="w-full mysilder flex justify-center items-center gap-2">

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]   h-[330px] rounded"
                                    src="{{asset('images/IMAGE_1.png')}}">
                            </div>

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]  h-[330px] rounded"
                                    src="{{asset('images/IMAGE_2.svg')}}"
                                    alt="">
                            </div>

                            <div class="">
                                <img class="object-cover saturate-120 md:w-[600px]  h-[330px] rounded"
                                    src="{{asset('images/IMAGE_3.svg')}}"
                                    alt="">
                            </div>


                        </div>

                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </section>




            <section class="" x-data="{ tab: 'username' }" x-cloak>


                <form role="form" method="POST" action="{{ route('auth.register') }}">
                    {!! csrf_field() !!}

                    <div class="flex flex-col items-center justify-center gap-4 mt-8">
                        <div>
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}" id="email" class="form-input"required />
                            @if ($errors->has('email'))
                                <div class="text-red-500">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div>
                            <input type="password" placeholder="Password" name="password" id="password" class="form-input" required />
                            @if ($errors->has('password'))
                                <div class="text-red-500">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" class="form-input" required />
                            @if ($errors->has('password_confirmation'))
                                <div class="text-red-500">{{ $errors->first('password_confirmation') }}</div>
                            @endif

                        </div>

                        

                        <button type="submit" class="mb-3 cursor-pointer btn btn-primary">
                            <div class="text-center"> Signup</div>

                        </button>
                    </div>


                </form>



            </section>


            {{-- s --}}

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
