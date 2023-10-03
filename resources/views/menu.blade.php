@extends('layouts.app')

@section('main')

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .popup-btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }

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
                    <input type="checkbox" class="check">
                    <div class="ltax">Add to map</div>
                </a>
                <a href="/dashboard" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">Dashboard</div>
                </a>
                <a href="/preferences" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">Community achievements</div>
                </a>
                <a href="" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">About City Layers</div>
                </a>
                <a href="" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">Term & contact</div>
                </a>
                <a href="" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">Privacy Policy and Terms of Service</div>
                </a>
                <a href="" class="lbox">
                    <input type="checkbox" class="check">
                    <div class="ltax">Impressum & accessibility</div>
                </a>
            </div>
            <div class="belo">
                <div class="mapping">Mappings are public. Youor username will be shown along with the mapping.</div>
                <div class="closebt" id="closePopup">Close</div>
            </div>
        </div>
    </div>

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
    <script>

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    document.getElementById("mylocation").innerHTML = pos.lat + " " + pos.lng;
                },
                function(e) {}, {
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 5000
                });
        }
    </script>
@endsection
