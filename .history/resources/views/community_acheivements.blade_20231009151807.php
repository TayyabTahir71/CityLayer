@extends('layouts.app')

@section('main')
    <div data-barba="container" class="p-6 lg:p-12">
        <a href="/">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>
        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">
            <label  class=" relative">
                <div class="object-cover rounded-full avatar_image flex justify-center items-center text-4xl">
                    🏆
                </div>
            
            </label>
           
            <div class="flex-r pt-4">
                <div class="bl">Community achievements</div>
               
            </div>
            
        </div>

        <div class="flex flex-col justify-center">
           

            <div class="dashboard">


                <div class="ddas">
                    <div class="fist">
                        <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                               onchange="javascript:this.form.submit();">
                        <label for="image" class="cursor-pointer new" >
                            <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage "
                                 src="{{asset('img/avatar.png')}}" alt="">
                        </label>
                        <div class="taz">   Citymapper</div>
                    </div>
                    <div class="scn">
                        <div class="taz">   Places mapped:xx</div>
                        <div class="taz">   Observations mapped:xx</div>
                    </div>

                </div>
                

            </div>
            <br/>
            <div class="belo">
                <div class="first">see <div class="plu">+</div> all</div>
                <div class="scnd">Back</div>
            </div>

            
        </div>
    </div>
    
@endsection
