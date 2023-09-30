<div>
 

</div>
<script>
    if (navigator.geolocation) {
        //wait 3 seconds to get position
        console.log(getposition());

    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function getposition() {

        var is_echo = false;
        if (navigator && navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    if (is_echo) {
                        return;
                    }
                    is_echo = true;
                    document.getElementById('latitude').value = pos.coords.latitude.toFixed(6);
                    document.getElementById('longitude').value = pos.coords.longitude.toFixed(6);
                    // success(pos.coords.latitude, pos.coords.longitude);
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
</script>
