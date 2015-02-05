<?php
echo gethostname();
$location = GeoIP::getLocation();
echo $location['ip'];