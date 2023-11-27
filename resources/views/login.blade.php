@extends('layouts.app')

@section('main')
    {{-- <div class="relative">
        <div class="absolute top-0 right-4 z-50">
            <div class="px-6 py-4 rounded-full border border-black text-black">
                About
            </div>
        </div>
    </div> --}}

    <div data-barba="container " class=" relative">
        <div class="absolute top-0 -mt-2 right-7  z-50">
            <a href="/about" class="px-6 py-4 rounded-full border border-black text-black">
                About
            </a>
        </div>
        <div class="flex flex-col items-center justify-center mt-8">

            @include('authTop')


            <div class="md:w-[400px] px-5 text-center mt-2">
                Create an account to keep track of your activities, or continue without signing up. If you wish to receive
                notifications from City Layers, sign up using your email. By proceeding, you agree to participate
                voluntarily in this study.
            </div>


            <section class="mb-4" x-data="{ tab: 'username' }">


                <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                    {!! csrf_field() !!}
                    <div class="flex flex-col items-center justify-center gap-4 mt-8" x-show="tab==='username'">
                        <input type="text" placeholder="Username" name="name" id="name" class="form-input"
                            required />
                        <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                            <div class="text-center"> Next</div>

                        </button>
                    </div>



                    <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                        <input type="password" placeholder="Password" name="password" id="password" class="form-input"
                            required />
                        <button type="submit" class="cursor-pointer btn btn-primary">
                            <div class="text-center"> Login</div>

                        </button>
                    </div>
                </form>


            </section>



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
