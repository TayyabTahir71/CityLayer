@php
    $locale = session()->get('locale');
    if ($locale == null) {
        $locale = 'en';
    }
@endphp
@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <div class="flex flex-col mx-auto">
            <div class="">
                <div class="relative">
                    <div class="" x-cloak x-data="{ show: false }">
                        <div class="fixed z-20 p-2 bg-black rounded-lg top-8 left-4 cursor-pointer" @click="show=true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="w-8 h-8 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </div>

                        <div x-show="show" @click.outside="show=false"
                            class="z-30 absolute top-20 left-4 w-[60%] bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="/admin/logout"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    @if(backpack_auth()->user()->id)
                        <div class="fixed z-20 flex items-center justify-center p-4 rounded-full cursor-pointer top-4 right-0" id="openPopup_profile">
                            <img class="object-cover rounded-full border-2 border-site h-14 w-14" src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                        </div>
                    @endif

                    <div onclick="mylocation()"
                        class="h-14 w-14 fixed z-20 flex items-center justify-center p-4 bg-black rounded-full cursor-pointer bottom-28 left-4">
                        <img src="{{ asset('img/triangle.png') }}" class="w-6 h-6" alt="">
                    </div>
                    <a href="/filter"
                        class="h-14 w-14 fixed z-20 flex items-center justify-center p-5 text-xl bg-white border-2 border-black rounded-full bottom-28 right-4">
                        <div class="">👁️</div>
                    </a>

                    <div id="map" class="absolute w-[100vw] z-10 h-[90vh]"></div>
                </div>

                <div x-data="{modelOpen: false,showMore: false,hidetab:'no',tab: 'place',searchQuery: '' }">
                    <div
                        class="fixed bottom-0 z-50 w-full pt-3 pb-8 text-xl font-semibold text-center shadow-xl rounded-t-3xl bg-gray-50 ">

                        <div class="flex items-center justify-center">
                            <div class="py-0.5 w-14 mb-3 rounded-full px-4 bg-black">

                            </div>

                        </div>


                        <div class="flex">
                            <div class="absolute left-16 bottom-[18px] ">
                                <div class="p-3 bg-[#ffa726] border-2 border-white rounded-full h-14 w-14">
                                    <span class="w-8 h-4">🔍</span>
                                </div>

                            </div>
                            <div class="absolute left-6 bottom-[18px] ">
                                <div class="p-3 bg-site border-2 border-white rounded-full h-14 w-14">
                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" alt="">
                                </div>

                            </div>
                        </div>

                        <div class="addToMap w-full pt-4" @click="tab ='place'; modelOpen =true; searchQuery=''" >
                            <span class="border-2 border-site w-full px-12 py-4 text-white bg-[#2d9bf0] rounded-3xl cursor-pointer">
                                Add to map
                            </span>

                        </div>


                        <div class="absolute right-5 bottom-[25px] ">
                            <div class="p-1 bg-site rounded-full w-9">
                                <span class="italic font-bold text-white">
                                    i
                                </span>
                            </div>
                        </div>

                    </div>


                    <div class="parentDiv" x-data="{ height: 'auto'}">
                        <button class="hidden OpenObservationModel" @click="modelOpen=true; showMore = true; hidetab = 'place'; tab='observation'; height = '100vh';"></button>
                        <button class="hidden openPlaceModel" @click="modelOpen=true; showMore = true; hidetab = 'observation'; tab='place'; height = '100vh';"></button>

                        <div x-cloak x-show="modelOpen " class="fixed bottom-0 z-50 overflow-y-auto"
                            aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center text-center">
                                <div x-cloak @click="modelOpen = false; hidetab = 'no'" x-show="modelOpen"
                                    class="closeAddProcess fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                                </div>

                                <div x-cloak x-show="modelOpen"
                                    x-transition:enter="transition ease-out duration-300 transform"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    {{-- x-transition:leave="transition ease-in duration-200 transform" --}}
                                    {{-- x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" --}}
                                    {{-- x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" --}}
                                    {{-- x-transition:enter="transition ease-in duration-300" --}}
                                    class="transition-height z-50 w-screen pb-16 transition-all transform bg-white h-[50%] shadow-xl mt-60 rounded-t-3xl"
                                    :style="'height: ' + height"
                                    :class="{'overflow-auto': showMore }"
                                    >

                                    <div class="p-6 lg:p-12">

                                        <div class="closeAddProcess mb-4" @click="modelOpen=false; showMore = false; hidetab = 'no'; height = 'auto';"
                                        x-show="showMore" class="mb-4">
                                            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
                                        </div>



                                        <div class="flex justity-between items-center gap-4">
                                            <input type="text" class="w-full px-2 py-2 bg-white rounded-full"
                                            placeholder="Choose tags or add new city layers" name="searchInput"
                                            x-model="searchQuery"
                                            @keyup="showMore = true; height = '100vh'">

                                            <a
                                            :href="tab === 'place' ? '/add-new/place' : '/add-new/observation'"
                                            class="p-2 border-2  transition-all rounded-full"
                                            :class="tab == 'place' ? 'bg-[#2d9bf0] border-[#2d9bf0]' : 'bg-[#ffa726] border-[#ffa726]'"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v12m6-6H6" />
                                                </svg>
                                             </a>

                                        </div>



                                        <div class="flex items-center justify-center mt-12 homeTabs">
                                            <div class="-mr-1 cursor-pointer" x-show="hidetab!='place'" @click="tab='place'">
                                                <div class="flex flex-col w-[84px] justify-center items-center">
                                                    <div class="bg-[#2d9bf0] border-2 border-white rounded-full "
                                                        :class="tab == 'place' || tab == 'place1' ?
                                                            'bg-[#2d9bf0] z-10 p-[26px] placeTabActive' :
                                                            'bg-[#2d9bf0]/70 p-[40px]'">
                                                        <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                                            :class="tab == 'place' || tab == 'place1' ? 'block' : 'hidden'"
                                                            id="place" alt="">
                                                    </div>
                                                    <div class="font-semibold text-sm text-center"
                                                        :class="tab == 'place' ? 'text-black' : 'text-black/50'">
                                                        Browse Places
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="-ml-1 cursor-pointer" x-show="hidetab!='observation'" @click="tab='observation'">
                                                <div class="flex flex-col w-[75px] justify-center items-center">

                                                    <div class="flex items-center justify-center border-2 border-white rounded-full "
                                                        :class="tab == 'observation' || tab == 'observation1' ?
                                                            'bg-[#ffa726] z-10 p-[20px] observationTabActive' :
                                                            'bg-[#ffa726]/70 p-[40px]'">
                                                        <div class="flex items-center justify-center w-10 h-10 text-2xl"
                                                            :class="tab == 'observation' || tab == 'observation1' ? 'block' :
                                                                'hidden'"
                                                            id="observation" alt="">🔍</div>
                                                    </div>

                                                    <div class=" font-semibold text-sm text-center"
                                                        :class="tab == 'observation' ? 'text-black' : 'text-black/50'">
                                                        Browse Observation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" x-data="{ active: '' }">

                                            <div class="flex items-start justify-center gap-10 mt-6 mb-6 italic font-semibold all-places"
                                                x-show="tab=='place'">

                                                <div class="grid grid-cols-3 italic font-semibold gap-10" id="searchResults2Pls">


                                                @foreach($allPlaces as $key=>$place)
                                                    <div

                                                    x-show="(showMore || {{ $key }} < 2) && (searchQuery === '' || '{{ strtolower($place->name) }}'.includes(searchQuery.toLowerCase()))"

                                                    class="flex flex-col items-center cursor-pointer"
                                                        @click="active='PL_{{ $place->id }}'">
                                                        <div data-place="{{ json_encode(['id'=>$place->id,'name'=>$place->name,'child'=>$place->subplaces]) }}" class="w-[76px] h-[76px] rounded-full bg-[#2d9bf0]"
                                                            :class="active == 'PL_{{ $place->id }}' ? 'border-4 border-blue-300 placeActive' : ''">
                                                            <div class="flex align-item-center justify-center items-center h-full">
                                                            <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                                                            </div>
                                                        </div>
                                                        <span class="mt-4 text-black font-normal">{{ $place->name }}</span>
                                                    </div>
                                                @endforeach

                                                <div x-show="!showMore" class="cursor-pointer">
                                                    <button @click="showMore = true; height = '100vh'">
                                                        <div class="rounded-full border-site border-4 p-[22px]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                                class="w-6 h-6 font-bold color-site">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                            </svg>
                                                        </div>
                                                        <div class="mt-4 text-black font-normal">See more</div>
                                                    </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="" x-data="{ active: '' }">
                                            <div class="flex items-center justify-center gap-10 mt-6 mb-6 italic font-semibold"
                                                x-show="tab=='observation'">
                                                <div class="grid grid-cols-3 italic font-semibold gap-10"
                                                    id="searchResults2Obs">
                                                    @foreach($allObservations as $key => $observation)
                                                        <div
                                                            x-data="{ active: false }"
                                                            x-show="(showMore || {{ $key }} < 2) && (searchQuery === '' || '{{ strtolower($observation->name) }}'.includes(searchQuery.toLowerCase()))"
                                                            class="flex flex-col items-center cursor-pointer"
                                                            @click="active = !active ? 'OB_{{ $observation->id }}' : false"
                                                        >
                                                            <div
                                                                data-observations="{{ json_encode(['id'=>$observation->id,'name'=>$observation->name,'child'=>$observation->subobservs]) }}"
                                                                class="w-[76px] h-[76px] rounded-full bg-[#ffa726]"
                                                                :class="active == 'OB_{{ $observation->id }}' ? 'border-4 border-blue-300 observationActive' : ''"
                                                            >
                                                                <div class="flex align-item-center justify-center items-center h-full">
                                                                    <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-8 h-8 -mr-1">
                                                                    <img src="{{ asset('new_img/happy.png') }}" alt="" class="w-8 h-8 -ml-1">
                                                                </div>
                                                            </div>
                                                            <span class="mt-4 text-black font-normal">{{ $observation->name }}</span>
                                                        </div>
                                                    @endforeach



                                                    <div x-show="!showMore" class="flex flex-col items-center justify-center cursor-pointer">
                                                        <button @click="showMore = true; height = '100vh'" type="button">
                                                            <div class="rounded-full border-[#ffa726] border-4  p-[22px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                                    class="w-6 h-6 font-bold text-[#ffa726]">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M12 6v12m6-6H6" />
                                                                </svg>

                                                            </div>
                                                            <div class="mt-4 text-black font-normal">See more</div>
                                                        </button>

                                                    </div>

                                                </div>



                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div  x-cloak x-show="modelOpen" class="fixed w-full bottom-0 z-50 bg-white py-4">
                            <div class="flex items-center justify-center">
                                <div class="submitData border-2 border-site flex cursor-pointer items-center justify-center gap-2 px-8 py-3 text-lg font-extrabold text-white bg-[#2d9bf0] rounded-3xl hover:shadow  hover:bg-[#268ede] transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="3" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    Add new</div>
                            </div>
                        </div>
                    </div>








                </div>


                <div class="parentDiv" x-data="{ subModelOpen: false,subtab:''}" x-cloak x-show="subModelOpen">

                    <button class="hidden subModeltrigerPlace" @click="subModelOpen=true;subtab='place'"></button>

                    <button class="hidden subModeltrigerObservation" @click="subModelOpen=true;subtab='observation'"></button>


                    <div  x-data="{subactive:''}" class="fixed h-screen overflow-auto bottom-0 bg-white z-[60] w-full pb-8 text-xl font-semibold text-center shadow-xl">

                        <div class="p-6 lg:p-12">

                            <div @click="subModelOpen=false;subactive='';subtab=''" class="mb-4 OpenObservationModel openPlaceModel">
                                <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
                            </div>


                            <div class="flex items-center justify-center mt-12 homeTabs">
                                <div class="-mr-1 cursor-pointer" x-show="subtab=='place'">
                                    <div class="flex flex-col w-[84px] justify-center items-center">
                                        <div class="bg-[#2d9bf0] border-2 border-white rounded-full"
                                            :class="subtab == 'place'?
                                                'bg-[#2d9bf0] z-10 p-[26px] subplaceTabActive' :
                                                'bg-[#2d9bf0]/70 p-[40px]'">
                                            <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7"
                                                :class="subtab == 'place' ? 'block' : 'hidden'"
                                                alt="">
                                        </div>

                                    </div>
                                </div>
                                <div class="-ml-1 cursor-pointer" x-show="subtab=='observation'">
                                    <div class="flex flex-col w-[75px] justify-center items-center">

                                        <div class="flex items-center justify-center border-2 border-white rounded-full"
                                            :class="subtab == 'observation' ?
                                                'bg-[#ffa726] z-10 p-[20px] subobservationTabActive' :
                                                'bg-[#ffa726]/70 p-[40px]'">
                                            <div class="flex items-center justify-center w-10 h-10 text-2xl"
                                                :class="subtab == 'observation' ? 'block' :
                                                    'hidden'"
                                                >
                                                <div class="flex align-item-center justify-center items-center h-full">
                                                    <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                        class="w-8 h-8 -mr-1"> <img
                                                        src="{{ asset('new_img/happy.png') }}" alt=""
                                                        class="w-8 h-8 -ml-1">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div>
                                <div x-show="subtab=='place'"  class="flex flex-col items-center justify-center mt-12">
                                    <div class="placeparent mb-10"></div>

                                    <div class="grid grid-cols-3 italic font-semibold gap-10 subPlacesItems">




                                    </div>
                                    <div class="flex items-center justify-between w-2/3 pt-28 pb-16 pb-12">
                                        <label class="flex flex-col items-center gap-1 cursor-pointer" for="image-upload">
                                            <input id="image-upload" type="file" class="hidden place_image" accept=".jpg, .png">
                                            <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-10 h-9">
                                            <div class="text-sm">Upload image</div>
                                        </label>

                                        <div class="relative" x-data="{ placeText: false }">
                                            <div @click="placeText = !placeText" class="flex flex-col items-center gap-1 cursor-pointer">
                                                <img src="{{ asset('img/msg.PNG') }}" alt="" class="w-10 h-9">
                                                <div class="text-sm">Add description</div>
                                            </div>
                                            <textarea class="font-normal place_description absolute px-2 py-2 bg-white rounded-xl w-[300px] right-0" x-show="placeText"></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div x-show="subtab=='observation'" class="flex flex-col items-center justify-center">
                                    <div class="grid grid-cols italic font-semibold gap-10 subObservationItems mt-12">




                                    </div>




                                    <div class="flex items-center justify-between w-2/3 pt-20 pb-16 mb-12">
                                        <label for="obser-image-upload" class="flex flex-col items-center gap-1 cursor-pointer">
                                            <input id="obser-image-upload" type="file" class="hidden observation_image" accept=".jpg, .png">
                                            <img src="{{ asset('img/cam.PNG') }}" alt="" class="w-10 h-9">
                                            <div class="text-sm">Upload image</div>
                                        </label>



                                        <div class="relative" x-data="{ observationText: false }">
                                            <div @click="observationText = !observationText" class="flex flex-col items-center gap-1 cursor-pointer">
                                                <img src="{{ asset('img/msg-2.PNG') }}" alt="" class="w-10 h-9">
                                                <div class="text-sm">Add description</div>
                                            </div>
                                            <textarea class="font-normal observation_description absolute px-2 py-2 bg-white rounded-xl w-[300px] right-0" x-show="observationText"></textarea>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>


                    <div class="fixed w-full bottom-0 z-[60] bg-white py-4">
                        <div class="flex items-center justify-center gap-6">
                            <div @click="subModelOpen=false;" class="flex cursor-pointer items-center justify-center border-2 border-site gap-2 px-8 py-3 text-lg font-extrabold color-site bg-white rounded-3xl transition-all">
                                Close
                            </div>

                            <div class="submitDataAll flex cursor-pointer items-center border-2 border-site justify-center gap-2 px-8 py-3 text-lg font-extrabold text-white bg-[#2d9bf0] rounded-3xl  hover:bg-[#268ede] transition-all">
                                Submit
                            </div>

                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>


    <div id="popup_profile" class="p-6 lg:p-12 w-full h-screen lg:w-4/12 fixed bg-white shadow-md ml-[-2px] overflow-y-auto right-0 hidden z-50 transform translate-x-full transition-transform duration-300">
        <a onclick="close_pop_profile()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="p-4">

            <div class="top">
                <div class="topo">

                    <label for="image" class="cursor-pointer new" >
                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage mimage"

                             src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">

                    </label>
                </div>
                <div class="tops">
                    <div class="toptaxt">Hello "{{ backpack_auth()->user()->name }}"!</div>
                    <a href="/profile" class="vieprofile">View Profile</a>
                </div>


            </div>
            <br/>
            <br/>
            <div class="list">
                <a href="/" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >+</div>
                    <div class="ltax">Add to map</div>
                </a>
                <a href="/dashboard" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >▄</div>
                    <div class="ltax">Dashboard</div>
                </a>
                <a href="/community-achievements" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >⌃</div>
                    <div class="ltax">Community achievements</div>
                </a>
                <a href="/about-us" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >?</div>
                    <div class="ltax">About City Layers</div>
                </a>
                <a href="/contact-us" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >•</div>

                    <div class="ltax">Term & contact</div>
                </a>
                <a href="/privacy-policy" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >!</div>

                    <div class="ltax">Privacy Policy and Terms of Service</div>
                </a>
                <a href="/impressum-accessibility" class="lbox">
                    <div class="flex justify-center items-center w-7 h-7 border-[3px] font-bold text-base border-black rounded-full text-center" >i</div>
                    <div class="ltax">Impressum & accessibility</div>
                </a>
            </div>
            <br/>
            <div class="belo">
                <div class="mapping">Mappings are public. Your username will be shown along with the mapping.</div>
                <div class="closebt cursor-pointer" onclick="close_pop_profile()">Close</div>
            </div>
        </div>
    </div>

    <script >
        const openPopupButton = document.getElementById('openPopup_profile');
        const popup = document.getElementById('popup_profile');

        openPopupButton.addEventListener('click', () => {
            popup.style.transform = 'translateX(0)';
            popup.style.display = 'block';
        });

        function close_pop_profile(){


            popup.style.transform = 'translateX(100%)';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 300);
        }

    </script>


    <script>
        data = {!! json_encode($all_data) !!};

        userid = {!! json_encode($userid) !!};
        markers = {};
        const edit_id = {{$edit_id?$edit_id:'0'}};
        let marker = null;

        let pin=[48.6890, 7.14086];
        if (data && data[0] && typeof data[0].latitude !== 'undefined' && typeof data[0].longitude !== 'undefined') {
            pin = [data[0].latitude, data[0].longitude];
        }
        let mymap0 = L.map('map').setView(pin, 6);

        // https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png

        osmLayer0 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 19,
            ext: 'png'
        }).addTo(mymap0);
        mymap0.zoomControl.remove();
        mymap0.addLayer(osmLayer0);
        mymap0.touchZoom.enable();
        mymap0.scrollWheelZoom.enable();

        let place_data = {
            place_id: '',
            child_place_id: '',
            observations: '',
            place_description: '',
            observation_description: '',
            latitude: '',
            longitude: '',
            tab: 'place',
        };


        var temp_des = [];


        var currentPosIcon = L.icon({
            iconUrl: '/new_img/current-pos.svg', // Replace with the path to your icon image
            iconSize: [62, 62], // Adjust the icon size as needed
            iconAnchor: [16, 16], // Adjust the anchor point of the icon
            popupAnchor: [0, -16] // Adjust the popup anchor for the icon
        });
        var currentPosIcon = L.divIcon({
            className: 'transparent-icon',
            iconSize: [64, 64], // Adjust the size of the icon including the border
            iconAnchor: [32, 32], // Adjust the anchor point of the icon
            html: '<div class="rounded-full border-2 border-site"><img src="/new_img/current-pos.svg" /></div>'
        });


        var placeIcon = L.divIcon({
            className: 'transparent-icon',
            html: `<div class="rounded-full bg-[#2d9bf0] border-2 border-white flex justify-center items-center p-4 w-[64px] h-[64px]">
                    <img src="{{ asset('new_img/image.png') }}" class="h-full w-full" />
                </div>`
        });
        var bothIcon = L.divIcon({
            className: 'transparent-icon',
            html: `<div class="rounded-full bg-[#2d9bf0] border-2 border-white flex justify-center items-center w-[64px] h-[64px]">
                        <div class="flex align-item-center justify-center items-center h-full">
                            <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-6 h-6 -mr-2">
                            <img src="{{ asset('new_img/image.png') }}" class="w-6 h-6 z-20" />
                            <img src="{{ asset('new_img/happy.png') }}" alt="" class="w-6 h-6 -ml-2">
                        </div>
                </div>`
        });
        var observationIcon = L.divIcon({
            className: 'transparent-icon',
            html: `<div class="rounded-full bg-[#ffa726] border-2 border-white flex justify-center items-center p-4 w-[64px] h-[64px]">
                    <div class="flex">
                     <img src="{{ asset('new_img/sad.png') }}" alt="" class="w-7 h-7 -mr-1">
                     <img src="{{ asset('new_img/happy.png') }}" alt="" class="w-7 h-7 -ml-1">
                    </div>
                 </div>`
        });



        if (navigator.geolocation) {

            //wait 3 seconds to get position
            getposition(success, fail)

        } else {
            alert("Geolocation is not supported by this browser.");
        }


        function getposition(success, fail) {

            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;

                        place_data['latitude']=pos.coords.latitude;
                        place_data['longitude']=pos.coords.longitude;

                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }

        }




        function success(lat, lng) {
            mymap0.setView([lat, lng], 10);

            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }



        function generateObservationHTML(observationDetail,place) {
            var obsrName= '';
            var addicon='';
            if(observationDetail.observation.name){
                obsrName = (observationDetail.observation ? observationDetail.observation.name : '') +
                (observationDetail.observation && observationDetail.observation_child ? '<span class="text-xs font-light"> → ' + observationDetail.observation_child.name + '</span>' : '');
            }else{
                obsrName= 'No Observation';
                if(place.user_id==userid){
                    addicon=`
                    <div data-id="${place.id}" class="cursor-pointer border-2 transition-all rounded-full bg-[#2d9bf0] border-white w-6 h-6 mt-1 noObservation">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                        </svg>
                    </div>
                    `;
                }
            }


            return `
            <div class="flex items-center justify-start gap-3 -mb-4 overflow-hidden">
                <div class="flex flex-col items-center justify-center">
                    <div class="rounded-full bg-[#ffa726] border-4 border-white w-[68px] h-[68px]">
                        <img src="${observationDetail.feeling.image}" alt="">
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <div class="text-center">
                        <img src="{{ asset('img/cam.PNG') }}" alt="" class="w-7 h-6">
                        <div class="font-sm font-light text-white">view</div>
                    </div>
                    <span class="text-lg italic font-extrabold text-white whitespace-nowrap ` + (observationDetail.observation.id ? 'w-screen' : '') + `">` + obsrName + `</span>
                    `+addicon+`
                </div>
            </div>
            `;
        }

        let count = 0;
        for (let i = 0; i < data.length; i++) {

            count = count + 1;
            place = data[i];


            placename = 'No Place';

            var addicon='';

            if(place.user_id==userid){
                addicon=`
                    <div data-id="${place.id}" class="cursor-pointer border-2 transition-all rounded-full bg-[#2d9bf0] border-white w-6 h-6 mt-1 noPlace">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                        </svg>
                    </div>
                    `;
            }

            if (place.place_detail) {

                placename = (place.place_detail.place ? place.place_detail.place.name : '') +
                (place.place_detail.place && place.place_detail.place_child ? '<span class="text-xs font-light"> → ' + place.place_detail.place_child.name + '</span>' : '');


                addicon='';
            }


            var textarea=textarea=`
                    <div class=" flex flex-col w-full items-end mt-4">
                        <div class="px-3 py-2 h-[60px] border-0 focus:outline-none focus:border-0 focus:ring-0 bg-[#2d9bf0] border-0 italic text-white placeholder-white leading-2 text-sm w-10/12">
                            `+ (place.description !== null ? place.description : '')+`
                        </div>
                    </div>
                `;
            if(place.user_id==userid){
                textarea=`
                    <div class=" flex flex-col w-full items-end mt-4">
                        <textarea clas type="text" data-id="` + place.id +`" id="myTextArea" class="h-[60px] border-0 focus:outline-none focus:border-0 focus:ring-0 bg-[#2d9bf0] border-0 italic text-white placeholder-white leading-2 text-sm w-10/12" placeholder="Place for a comment max 120 characters" />`+ (place.description !== null ? place.description : '')+`</textarea>
                    </div>
                `;
            }




            username = place.user.name;



            const givenDate = new Date(place.created_at); // Replace with your given date
            const options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit'
            };
            const formattedDate = givenDate.toLocaleDateString('en-US', options);
            // pics = place.image0;
            placelatitude = place.latitude;
            placelongitude = place.longitude;
            var obsrvTotal=Object.keys(place.observations_detail).length;


            if ((place.place_detail) && obsrvTotal==0) {
                icon2 = placeIcon;
            }
            if ((place.place_detail) && obsrvTotal>0) {
                icon2 = bothIcon;
            }
            if ((place.place_detail) == null && obsrvTotal>0) {
                icon2 = observationIcon;
            }


          

            var observationsList='';

            if (obsrvTotal > 0) {
                place.observations_detail.forEach(observationDetail => {
                    observationsList += generateObservationHTML(observationDetail);
                },'');
            } else {
                observationsList += generateObservationHTML({
                    observation: 'null',
                    observation_child: null,

                    feeling: { image: '' }
                },place);
            }


            markerx = L.marker([placelatitude, placelongitude], {
                icon: icon2
            }).addTo(mymap0).bindPopup(


                `<div class="bg-[#2d9bf0] p-0 w-full">

                    <div class="flex items-center justify-start gap-3 -mb-4 overflow-hidden">
                        <div class="flex flex-col items-center justify-center">
                            <div class="rounded-full bg-[#2d9bf0] border-4 border-white p-3 w-[68px] h-[68px]">
                                <img class="w-full h-full" src="{{ asset('new_img/image.png') }}" />
                            </div>
                        </div>
                        <div class="flex gap-4 mt-4">
                            <div class="text-center">
                                <img src="{{ asset('img/cam-2.PNG') }}" alt="" class="w-7 h-6">
                                <div class="font-sm font-light text-white">view</div>
                            </div>
                            <span class="text-lg italic font-extrabold text-white">
                            ` + placename + `
                            </span>
                            `+addicon+`


                        </div>
                    </div>

                    `+observationsList+`

                    `+textarea+`

                    <span class="flex items-end justify-end mt-6 -mb-3 italic font-light text-white">
                        Added by ` + username + ` on ` + formattedDate + `
                    </span>
                </div>`
            );

            markerx.on('popupopen', (event) => {
                const _id = event.popup._source.placeDetailID;
                if(_id && temp_des['_'+_id]){
                    $('body #myTextArea').text(`${temp_des['_'+_id]}`);
                }
                var typingTimer;
                var delay = 1000;
                function handleTypingStopped() {
                    const data = $('body #myTextArea').val();
                    const id = $('body #myTextArea').data('id');

                    if(data && id){
                        temp_des['_'+id]=data;
                        saveDescription(data, id);
                        $('body #myTextArea').blur();
                    }
                }
                $('body #myTextArea').on('input', function () {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(handleTypingStopped, delay);
                });

            });
            markerx.placeDetailID = place.id;
            markers[place.id] = markerx;
        }

        function mylocation() {
            getmyposition(success, fail);
        }







        function getmyposition(success, fail) {

            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {

                        if (is_echo) {
                            return;
                        }
                        is_echo = true;

                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }
        }

        function success(lat, lng) {
            mymap0.flyTo([lat, lng], 19);
            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }

        function zoom() {
            myzoom(success, fail);
        }

        function myzoom(success, fail) {
            var is_echo = false;
            if (navigator && navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(pos) {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        success(pos.coords.latitude, pos.coords.longitude);
                    },
                    function() {
                        if (is_echo) {
                            return;
                        }
                        is_echo = true;
                        fail();
                    }
                );
            } else {
                fail();
            }
        }

        function success(lat, lng) {
            mymap0.flyTo([lat, lng], 16);
            L.marker([lat, lng], {
                icon: currentPosIcon
            }).addTo(mymap0);
        }

        function fail() {
            alert("location failed");
        }





        $('body').on('click', '.addToMap', function() {
            set_empty();


        });
        $('body').on('click', '.submitData', function() {

            $('.subPlacesItems').html('');
            $('.subObservationItems').html('');

            var place_detail = $(this).closest('.parentDiv').find('.placeActive').data('place');

            var observations_detail = [];
            $(this).closest('.parentDiv').find('.observationActive').each(function() {
                var data = $(this).data('observations');
                observations_detail.push(data);
            });


            var $homeTab = $(this).closest('.parentDiv').find('.observationTabActive').length > 0 ? 'observation' : 'place';
            place_data['tab'] = $homeTab;
            if($homeTab=='place' && place_detail.id){
                place_data['place_id']=place_detail.id;

                if(place_detail.child.length>0){
                    $('.placeparent').text(place_detail.name);
                    var allHtml = '';
                    place_detail.child.forEach(place => {
                        allHtml+=`
                        <div class="flex flex-col items-center cursor-pointer" @click="subactive='SPL_${place.id}'">
                                            <div data-subplaceid="${place.id}" class="w-[76px] h-[76px] rounded-full bg-[#2d9bf0]"
                                            :class="subactive == 'SPL_${place.id}' ? 'border-4 border-blue-300 subplaceActive' : ''">
                                                <div class="flex align-item-center justify-center items-center h-full">
                                                    <img src="{{ asset('new_img/image.png') }}" class="w-7 h-7" />
                                                </div>
                                            </div>
                                            <span class="mt-4 text-black font-normal text-base">${place.name}</span>
                                        </div>
                        `;
                    });
                    $('.subPlacesItems').html(allHtml);

                    $('.subModeltrigerPlace').click();
                }else{
                    submitDetailData(place_data);
                }


            }else if($homeTab=='observation'){
                var allHtml = '';

                observations_detail.forEach(function(observation) {

                    allHtml+=`<div data-observation_id="${observation.id}"><div class="mb-4">${observation.name}</div>`;

                    var feelingHtml=`
                                <div x-data="{ feelActive${observation.id}: 'feel_${observation.id}_1' }" class="flex flex-wrap items-center justify-center gap-2 italic font-semibold w-full ">
                                    @foreach($feelings as $feeling)
                                        <div data-feeling_id="{{$feeling->id}}"
                                            @click="feelActive${observation.id}='feel_${observation.id}_{{ $feeling->id }}'"
                                            class="cursor-pointer rounded-full"
                                            :class="feelActive${observation.id} == 'feel_${observation.id}_{{ $feeling->id }}' ? 'border-4 border-blue-300 feelingActive' : ''"
                                            >
                                            <img class="w-12 h-12 sm:w-16 sm:h-16" src="{{ asset($feeling->image) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                    `;

                    if (observation.child.length === 0) {
                        allHtml+=`
                            <div data-subobservation_id="" class="flex items-center justify-between mb-10">
                               ${feelingHtml}
                            </div>
                        `;
                    }else{
                        observation.child.forEach(observ => {
                            allHtml+=`
                            <div data-subobservation_id="${observ.id}" class="flex gap-2 lg:gap-20 items-center justify-between mb-10">
                                <div class="flex flex-col items-center w-[160px]">
                                    <div class="w-[76px] h-[76px] rounded-full bg-[#ffa726]">
                                        <div class="flex align-item-center justify-center items-center h-full">
                                            <img src="{{ asset('new_img/sad.png') }}" alt=""
                                                            class="w-8 h-8 -mr-1"> <img
                                                            src="{{ asset('new_img/happy.png') }}" alt=""
                                                            class="w-8 h-8 -ml-1">
                                        </div>
                                    </div>
                                    <span class="mt-1 text-black font-normal text-base">${observ.name}</span>
                                </div>

                                ${feelingHtml}
                            </div>`;
                        });
                    }

                    allHtml+=`</div>`;
                });

                $('.subObservationItems').html(allHtml);



                $('.subModeltrigerObservation').click();
            }



        });

        var fileInput_place='';
        var fileInput_observation='';

        $('body').on('click', '.submitDataAll', function() {

            var $SubTab = $(this).closest('.parentDiv').find('.subobservationTabActive').length > 0 ? 'observation' : 'place';

            if($SubTab=='place'){
                var subplace_id = $(this).closest('.parentDiv').find('.subplaceActive').data('subplaceid');
                fileInput_place = $(".place_image")[0].files[0];
                place_data['place_description']=$(this).closest('.parentDiv').find('.place_description').val();
                place_data['child_place_id']=subplace_id?subplace_id:'';
            }else if($SubTab=='observation'){
                fileInput_observation = $(".observation_image")[0].files[0];
                place_data['observation_description']=$(this).closest('.parentDiv').find('.observation_description').val();
                var dataList = [];
                $(this).closest('.parentDiv').find('.feelingActive').each(function() {
                    var observationId = $(this).closest('[data-observation_id]').data('observation_id');
                    var subobservationId = $(this).closest('[data-subobservation_id]').data('subobservation_id');
                    var feelingId = $(this).data('feeling_id');

                    dataList.push({
                        observation_id: observationId,
                        child_observation_id: subobservationId,
                        feeling_id: feelingId
                    });
                });
                place_data['observations']=dataList;

            }
            // console.log(place_data);
            submitDetailData(place_data);

        });



        $('body').on('click', '.noPlace', function() {

            set_empty();


            place_data['place_detail_id'] = $(this).data('id');
            place_data['update'] = 'place';
            $('.openPlaceModel').click();
        });

        $('body').on('click', '.noObservation', function() {

            set_empty();

            place_data['place_detail_id'] = $(this).data('id');
            place_data['update'] = 'observation';
            $('.OpenObservationModel').click();
        });

        function set_empty(){
            place_data['place_id']='';
            place_data['place_detail_id']='';
            place_data['child_place_id']='';
            place_data['observations']='';
            place_data['place_description']='';
            place_data['observation_description']='';
            place_data['tab']='place';
            place_data['update']='';
        }



        function submitDetailData(place_data) {


            const formData = new FormData();
            if (fileInput_place) {
                formData.append('place_image', fileInput_place);
            }
            if (fileInput_observation) {
                formData.append('observation_image', fileInput_observation);
            }

            formData.append('place_data', JSON.stringify(place_data));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'POST',
                url: "/map/add/place",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    var reverse_tab = data.tab=='place' ? 'observation' : 'place';
                    if(data.status=='success'){

                        if(data.completed){
                            window.location.href = '/';
                        }else{
                            place_data['place_detail_id']=data.place_detail_id;
                            swal({
                                title: "Success!",
                                text: data.tab.charAt(0).toUpperCase() + data.tab.slice(1)+" "+data.msg+" Do you want to add "+reverse_tab+" tag?",
                                icon: "success",
                                buttons: ["Close", "Continue"],
                            }).then((userConfirmed) => {
                                if (userConfirmed) {
                                    if(reverse_tab=='place'){
                                        $('.openPlaceModel').click();
                                    }else{
                                        $('.OpenObservationModel').click();
                                    }
                                } else {
                                    window.location.href = '/';
                                    // $('.closeAddProcess').click();
                                }
                            });
                        }


                    }

                }
            });

        }


        function saveDescription(data, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/save-des',
                type: 'POST',
                data: {
                    data: data,
                    id: id
                },
                success: function(response) {
                    // swal({
                    //     icon: "success",
                    //     text: "Thanks for your thoughts!",

                    // })

                    // window.location.href = "/";
                },
                error: function(error) {
                    console.error('Error saving data');
                }
            });
        }

        $(document).ready(function(){

            if(edit_id && edit_id!=0){
                $('.openPlaceModel').click();
                // $('.OpenObservationModel').click();
            }
        });

    </script>

@endsection
