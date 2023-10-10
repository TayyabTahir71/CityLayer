@extends('layouts.app')

@section('main')
    <div data-barba="container" class="relative h-screen p-6 lg:p-12">
        <a href="/edit_profile">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>

        <form action="save_preferences" class="flex flex-col items-center justify-center pt-12 gap-x-6 lg:pt-20" method="POST">
            {!! csrf_field() !!}
            @csrf
           
            <label for="image" class="relative">
                <img class="object-cover rounded-full avatar_image"
                     src="/storage/uploads/avatar/{{ backpack_auth()->user()->avatar }}" alt="">
                
            </label>
           
            <div class="flex-r pt-4">
                <div class="bl">Edit city tags</div>
                <div class="i bg-site">i</div>
            </div>
            <br/>
            <input placeholder="Browse city tags" id="searchInput" class="bg-[#e6e6e6] px-12 py-4 rounded-3xl text-[#1a1a1a] placeholder-[#1a1a1a] focus:ring-blue-500 w-full lg:w-2/6 text-center">
            <br/>

            <div class="flex flex-col items-center justify-center">
               
                <div class="pt-8">


                    <div class="fb justify-center">
                        <div class="flex flex-row items-center justify-center gap-3 flex-wrap	">
                
                            <?php


                            foreach ($preferences_array as $ref) {
                                $isChecked = in_array($ref, $preferences) ? "checked" : "";
                                echo '
                                <label class="preference-item">
                                    <input type="checkbox" name="preferences[]" value="' . htmlspecialchars($ref) . '" ' . $isChecked . ' class="sr-only peer">
                                    <div class="bg-yel  border-ms px-5 italic font-light group  border ring-offset peer-checked:text-white peer-checked:bg-[#CDB8EB] bg-purple-200 peer-focus:ring-2">
                                        
                                            ' .($ref) . '
                                        
                                    </div>
                                </label>
                                ';
                            }
                            ?>
                        
                        </div>
        
                    </div>

  

                   

                </div>

                <div class="flex-r items-center justify-center pt-20">
                    <a href="/edit_profile" class="px-6 py-4 font-bold border-2	font-sm rounded-3xl text-white bg-site border-site">Back</a>
                    <button type="submit" class="px-6 py-4 font-bold	font-sm rounded-3xl color-site border-2 border-site cursor-pointer">Save and close</button>
                </div>
                
        </form>
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
