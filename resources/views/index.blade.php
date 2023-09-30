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


            <section class="mt-12" x-data="{ tab: 'get_started' }">

                <div class="flex flex-col items-center justify-center gap-4" x-show="tab=='get_started'">
                    <button @click="tab='login_optns'" class="cursor-pointer btn btn-primary">
                        <div class="text-center">Get Started</div>

                    </button>
                    <a href="/login" class="cursor-pointer btn btn-secondary">
                        <div class="text-center">Login</div>
                    </a>

                    <p class="mt-2 text-center px-7">
                        By Confirming you agree with 'City Layer' <span class="text-blue-500">Privacy Policy</span> and
                        <span class="text-blue-500">Terms of Service.</span>
                    </p>
                </div>

                <div class="flex flex-col items-center justify-center gap-4" x-show="tab=='login_optns'">


                    <a href="/sign-up-u" class="cursor-pointer btn btn-primary" @click="opt='username'">
                        <div class="text-center">Sign up with username</div>

                    </a>
                    <a href="/sign-up-e" class="cursor-pointer btn btn-primary" @click="opt='email'">
                        <div class="text-center">Sign up with email</div>

                    </a>




                    <a href="/signup" class="cursor-pointer my-2 btn btn-secondary">
                        <div class="text-center">Sign up later</div>
                    </a>
                </div>

                {{-- <div class="flex flex-col items-center justify-center gap-4" x-show=" opt==='username'">
                        <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='username'">
                                <input type="text" placeholder="Username" name="name" id="name"
                                    class="form-input" required />
                                <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                                    <div class="text-center"> Next</div>

                                </button>
                            </div>



                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-input" required />
                                <button type="submit" class="cursor-pointer btn btn-primary">
                                    <div class="text-center"> Login</div>

                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-4" x-show=" opt==='email'">

                        <form role="form" method="POST" action="{{ route('backpack.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='username'">
                                <input type="text" placeholder="Username" name="name" id="name"
                                    class="form-input" required />
                                <button type="button" class="cursor-pointer btn btn-primary" @click="tab='password'">
                                    <div class="text-center"> Next</div>

                                </button>
                            </div>



                            <div class="flex flex-col items-center justify-center gap-4 mt-12" x-show="tab==='password'">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-input" required />
                                <button type="submit" class="cursor-pointer btn btn-primary">
                                    <div class="text-center"> Login</div>

                                </button>
                            </div>
                        </form>
                    </div> --}}






            </section>


        </div>


    </div>
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
@endsection
