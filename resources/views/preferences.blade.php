@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen p-6 lg:p-12">
        <a href="/edit_profile">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>

        <div class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20">

            <label for="image" class="relative">
                <img class="object-cover rounded-full avatar_image"
                    src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">

            </label>

            <div class="flex-r pt-4">
                <div class="font-semibold">Define your areas of interest</div>
                <div class="i bg-site">i</div>
            </div>



            <form action="{{ route('newpreference') }}" class="flex w-full justify-center mt-3 gap-4" method="POST">
                {!! csrf_field() !!}
                @csrf

                <input required placeholder="Browse or add your interests" name="preference" id="searchInput"
                    class="bg-[#e6e6e6] px-8 py-4 rounded-3xl text-[#1a1a1a] placeholder-[#1a1a1a] focus:ring-blue-500 w-full lg:w-2/6 text-center">

                <button type="submit"
                    class="p-2 border-2 transition-all rounded-full bg-[#2d9bf0] border-[#2d9bf0] w-[56px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                    </svg>
                </button>
            </form>



            <form action="save_preferences" class="flex flex-col items-center justify-center" method="POST">
                {!! csrf_field() !!}
                @csrf

                <div class="pt-8">
                    <div class="fb justify-center">
                        <div class="flex flex-row items-center justify-center gap-3 flex-wrap	">
                            <?php
                            foreach ($preferences_array as $ref) {
                                $isChecked = in_array($ref, $preferences) ? 'checked' : '';
                                echo '
                                                                                                                    <label class="preference-item">
                                                                                                                        <input type="checkbox" name="preferences[]" value="' .
                                    htmlspecialchars($ref) .
                                    '" ' .
                                    $isChecked .
                                    ' class="sr-only peer">
                                                                                                                        <div class="bg-yel  border-ms px-5 italic font-light group  border ring-offset peer-checked:text-white peer-checked:bg-[#CDB8EB] bg-purple-200 peer-focus:ring-2">
                                                                                                                                ' .
                                    $ref .
                                    '
                                                                                                                        </div>
                                                                                                                    </label>
                                                                                                                    ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="flex-r items-center justify-center pt-20">
                    <a href="/edit_profile"
                        class="px-6 py-4 font-bold border-2	font-sm rounded-3xl text-white bg-site border-site">Back</a>
                    <button type="submit"
                        class="px-6 py-4 font-bold	font-sm rounded-3xl color-site border-2 border-site cursor-pointer">Save
                        and close</button>
                </div>



            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                console.log('aa');
                var searchTerm = $(this).val().toLowerCase();

                $('.preference-item').hide();

                <?php foreach ($preferences_array as $ref) { ?>
                var preferenceText = "<?php echo strtolower(__($ref)); ?>";
                if (preferenceText.includes(searchTerm) || searchTerm === '') {
                    $('.preference-item:contains("<?php echo __($ref); ?>")').show();
                }
                <?php } ?>
            });
        });
    </script>
@endsection
