@extends('layouts.app')

@section('main')
    <div data-barba="container">
        <a href="javascript:history.back()">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">
        </a>
        <div class="flex flex-col h-screen mx-auto">
            <form action="save_profile" class="flex flex-col justify-center p-4 mx-auto" method="POST">
                {!! csrf_field() !!}
                @csrf
                <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="javascript:this.form.submit();">
                <label for="image" class="cursor-pointer new">
                    <div class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full" style="border-width: 7px;display: flex;justify-content: center;align-items: center">
                        <div>🏆</div>
                    </div>
                </label>
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-2/3"></label>
                <div class="dash">Community achievements</div>
            </form>

            <div class="z-0 p-3 pt-16 space-y-4 lg:mx-16 md:pt-20">
                <div class="grid grid-cols-1">
                    <div class="dashboard">
                        @forelse ($users as $user)
                            <div class="ddas">
                                <div class="fist">
                                    <input type="file" style="" name="image" id="image" class="hidden" accept="image/*" onchange="javascript:this.form.submit();">
                                    <label for="image" class="cursor-pointer new">
                                        @php
                                            $img = $user['avatar'] ?? null;
                                            $imgSrc = $img ? asset('storage/uploads/avatar/' . $img) : asset('images/iconfinder_avatar_boy_kid_person_4043238.svg');
                                        @endphp
                                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage" src="{{ $imgSrc }}" onerror="this.src='images/iconfinder_avatar_boy_kid_person_4043238.svg'" alt="">
                                    </label>
                                    <div class="taz">   {{ $user['name'] }}</div>
                                </div>
                                <div class="scn">
                                    <div class="taz">   Places mapped:xx</div>
                                    <div class="taz">   Observations mapped:xx</div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                        <div class="first" id="see-more-button" onclick="showNextChunk()">See more <div class="plu">+</div></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let chunkIndex = 0;

        function showNextChunk() {
            const chunks = document.querySelectorAll('.ddas');

            // Hide all chunks
            chunks.forEach(chunk => {
                chunk.style.display = 'none';
            });

            if (chunkIndex < chunks.length) {
                // Show the next chunk
                for (let i = chunkIndex; i < chunkIndex + 4 && i < chunks.length; i++) {
                    chunks[i].style.display = 'block';
                    chunks[i].style.display = 'flex';
                }
                chunkIndex += 4;
            }
        }
    </script>
@endsection
