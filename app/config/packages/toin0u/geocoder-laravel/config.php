<?php

/**
 * This file is part of the GeocoderLaravel library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return array(
    'providers' => array(
        'Geocoder\Provider\GoogleMapsProvider' => array('de_DE', null, false),
        'Geocoder\Provider\FreeGeoIpProvider'  => null,
    ),
    'adapter'  => 'Geocoder\HttpAdapter\CurlHttpAdapter'
);