@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>

        <form action="save_preferences" class="flex flex-col items-center justify-center p-8 mx-auto" method="POST">
            {!! csrf_field() !!}
            @csrf
            <input type="file" name="image" id="image" class="hidden" accept="image/*"
                   onchange="javascript:this.form.submit();">
            <label for="image" class="cursor-pointer new" >
                <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full  " style="border-width: 7px"
                     src="{{asset('img/avatar.png')}}" alt="">
            </label>
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3 ">
                <div class="flex flex-col items-center justify-center pb-6">
                </div>
            </label>
            <div class="flex-r">
                <div class="bl">Edit city tags</div>
                <div class="i">i</div>
            </div>
            <br/>
            <input placeholder="Browse or add new city tags" class="inp1">
            <br/>

            <div class="flex flex-col items-center justify-center">
                <div class="pt-8">

                 @php
                 if ($preferences == null) {
                     $preference = [];}
                    else {
                          $preference = json_decode($preferences);
                    }
                 @endphp
                    <label>
                        <input type="checkbox" name="preferences[]" value="I love long walks" {{ in_array("I love long walks", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold ">{{ __('messages.I love long walks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school / work" {{ in_array("I walk to school / work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex bg-yel items-center rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">

                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I am in a wheelchair"  {{ in_array("I am in a wheelchair", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I am in a wheelchair') }}</div>
                            </div>
                        </div>
                    </label>


                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy outdoor sports"  {{ in_array("I enjoy outdoor sports", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy outdoor sports') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I walk to school or work"  {{ in_array("I walk to school or work", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I walk to school / work') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I cycle / scooter"  {{ in_array("I cycle / scooter", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I cycle / scooter') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by car"  {{ in_array("I mostly travel by car", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I mostly travel by car') }}</div>
                            </div>
                        </div>
                    </label>

                                      <label>
                        <input type="checkbox" name="preferences[]" value="I mostly travel by public transport"  {{ in_array("I mostly travel by public transport", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border bg-yel p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I mostly travel by public transport') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love exploring new places"  {{ in_array("I love exploring new places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I love exploring new places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I am interested in architecture"  {{ in_array("I am interested in architecture", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('messages.I am interested in architecture') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]"
                            value="I enjoy visiting historical landmarks"  {{ in_array("I enjoy visiting historical landmarks", $preference) ? "checked" : "" }}
                             class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">
                                    {{ __('messages.I enjoy visiting historical landmarks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy calm parks and nature"  {{ in_array("I enjoy calm parks and nature", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy calm parks and nature') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I love pocket parks"  {{ in_array("I love pocket parks", $preference) ? "checked" : "" }}
                         class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I love pocket parks') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy gardening in urban spaces"  {{ in_array("I enjoy gardening in urban spaces", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center rounded border p-3 bg-yel ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy gardening in urban spaces') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy lively and vibrant places"  {{ in_array("I enjoy lively and vibrant places", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy lively and vibrant places') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I enjoy being outside in the night"  {{ in_array("I enjoy being outside in the night", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I enjoy being outside in the night') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have difficulties walking"  {{ in_array("I have difficulties walking", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I have difficulties walking') }}</div>
                            </div>
                        </div>
                    </label>

                    <label>
                        <input type="checkbox" name="preferences[]" value="I have issues with eyesight"  {{ in_array("I have issues with eyesight", $preference) ? "checked" : "" }}
                            class="sr-only peer">
                        <div
                            class="group mb-3 flex items-center bg-yel rounded border p-3 ring-offset-2 peer-checked:text-white peer-checked:bg-[#CDB8EB]  bg-purple-200 peer-focus:ring-2">
                            <div class="flex justify-center text-white">
                                <div class="font-semibold">{{ __('messages.I have issues with eyesight') }}</div>
                            </div>
                        </div>
                    </label>



                    <div class="flex-r items-center justify-center">
                        <button class="bg-blue-500 text-white p-3 rounded-lg backbtn">Back</button>
                        <button type="submit" class="text-blue-500 border border-blue-500 p-3   rounded-lg backbtn">Save and close</button>
                    </div>
        </form>
    </div>



    <script></script>
@endsection
