<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| API Keys
	|--------------------------------------------------------------------------
	|
	| Set the public and private API keys as provided by reCAPTCHA.
	|
	| In version 2 of reCAPTCHA, public_key is the Site key,
	| and private_key is the Secret key.
	|
	*/
	'public_key'	=> '6LfMtAATAAAAABZq7PG8KM--DwFFyFufKWN1jpMb',
	'private_key'	=> '6LfMtAATAAAAAEZhwm7_Q_1HQ9aHsIR8rp6AgU51',
	
	/*
	|--------------------------------------------------------------------------
	| Template
	|--------------------------------------------------------------------------
	|
	| Set a template to use if you don't want to use the standard one.
	|
	*/
	'template'		=> '',

	/*
	|--------------------------------------------------------------------------
	| Driver
	|--------------------------------------------------------------------------
	|
	| Determine how to call out to get response; values are 'curl' or 'native'.
	| Only applies to v2.
	|	
	*/	
	'driver'   	=> 'curl',

	/*
	|--------------------------------------------------------------------------
	| Options
	|--------------------------------------------------------------------------
	|
	| Various options for the driver
	|	
	*/	
	'options'   	=> array(
		
		'curl_timeout' => 1,
		
	),

	/*
	|--------------------------------------------------------------------------
	| Version
	|--------------------------------------------------------------------------
	|
	| Set which version of ReCaptcha to use.
	|	
	*/	
	'version'   	=> 2,

);