@extends('layouts.app')

@section('main')

    <style>


        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            right: -400px;
            height: 100%;
            width: 400px;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }

        .popup-content {
            padding: 20px;
        }

        .close-btn {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

    </style>
    <button id="openPopup" class="popup-btn">Open Popup</button>

    <div id="popup" class="popup-container">
        <a id="closePopup">
            <img src="{{ asset('img/icons/arrow.png') }}" class="arrow">

        </a>
        <div class="popup-content">

            <div class="top">
                <div class="topo">
                    <input type="file" style="" name="image" id="image" class="hidden" accept="image/*"
                           onchange="javascript:this.form.submit();">
                    <label for="image" class="cursor-pointer new" >
                        <img class="object-cover w-24 h-24 border-7 border-blue-500 rounded-full nimage mimage"
                             style="height: 80px;width: 80px"
                             src="{{asset('images/iconfinder_avatar_boy_kid_person_4043238.svg')}}" alt="">
                    </label>
                </div>
                <div class="tops">
                    <div class="toptaxt">Hello "USername!"</div>
                    <a href="/profile" class="vieprofile">View Profile</a>
                </div>


            </div>
            <br/>
            <br/>
            <div class="list">
                <a href="/" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">+</div>
                    <div class="ltax">Add to map</div>
                </a>
                <a href="/dashboard" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">.</div>
                    <div class="ltax">Dashboard</div>
                </a>
                <a href="/preferences" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">"</div>
                    <div class="ltax">Community achievements</div>
                </a>
                <a href="/about" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">?</div>
                    <div class="ltax">About City Layers</div>
                </a>
                <a href="/contact" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">.</div>

                    <div class="ltax">Term & contact</div>
                </a>
                <a href="/privacy_policy" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">!</div>

                    <div class="ltax">Privacy Policy and Terms of Service</div>
                </a>
                <a href="/impressum" class="lbox">
                    <div class="check" style="text-align: center;font-weight: bold;font-size: 1rem">i</div>
                    <div class="ltax">Impressum & accessibility</div>
                </a>
            </div>
            <br/>
            <div class="belo">
                <div class="mapping">Mappings are public. Youor username will be shown along with the mapping.</div>
                <div class="closebt" id="closePopup">Close</div>
            </div>
        </div>
    </div>



    <div class="fixed inset-y-0 right-0 w-64 bg-gray-900 shadow-lg transform translate-x-full transition-transform duration-300" id="slider">
        <!-- Content of the slider -->
        <div class="p-4">
          <!-- Your slider content goes here -->
          <p>This is your slider content.</p>
        </div>
      
        <!-- Close button -->
        <button id="closeButton" class="absolute top-0 right-0 m-2 text-white hover:text-red-500 transition">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      
      <!-- Button to open the slider -->
      <button id="openButton" class="fixed top-4 right-4 p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">
        Open Slider
      </button>
      <script>
        Alpine.data('slider', () => ({
          isOpen: false,
      
          open() {
            this.isOpen = true;
            this.$nextTick(() => {
              this.$refs.slider.classList.remove('translate-x-full');
            });
          },
      
          close() {
            this.$refs.slider.classList.add('translate-x-full');
            setTimeout(() => {
              this.isOpen = false;
            }, 300);
          },
        }));
      </script>      


    <script >
        const openPopupButton = document.getElementById('openPopup');
        const closePopupButton = document.getElementById('closePopup');
        const popup = document.getElementById('popup');

        openPopupButton.addEventListener('click', () => {
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.right = '0';
            }, 10);
        });

        closePopupButton.addEventListener('click', () => {
            popup.style.right = '-400px';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 500); // This duration should match your CSS transition duration
        });

    </script>

@endsection
