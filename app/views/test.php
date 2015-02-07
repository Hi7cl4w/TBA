<?php
echo gethostname();

try {
    $longitude="75.3969035";
    $latitude="11.8841546";
    $location = GeoIP::getLocation();

    // The GoogleMapsProvider will return a result
    var_dump($location);
} catch (\Exception $e) {
    // No exception will be thrown here
    echo $e->getMessage();
}