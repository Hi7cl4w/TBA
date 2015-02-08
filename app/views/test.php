<!DOCTYPE html>
<html>
<body>
<?php
echo gethostname();

try {
    $longitude="76.6547932";
    $latitude="10.7867303";
    $geocode = Geocoder::reverse($latitude,$longitude);


    // The GoogleMapsProvider will return a result
    var_dump($geocode);
} catch (\Exception $e) {
    // No exception will be thrown here
    echo $e->getMessage();
}
Mail::laterOn('ticket', 5, 'emails.ticket.admin', array('key' => 'value'), function ($message)  {

    $message->to("manuknarayanan@gmail.com", 'no-replay')->subject('Welcome!');
});
?>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>


<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
}
</script>

</body>
</html>
