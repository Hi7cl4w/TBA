<?php

class UserTableSeeder extends Seeder{
	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'id'=> 1 ,
			'username' => 'admin' ,
			'fname' => 'manu' ,
			'lname' => 'k' ,
			'user_password' => Hash::make('123456') ,
			'user_email' => 'manuknarayanan@gmail.com' ,
			'user_account_type' => 3 ,
			'user_rememberme_token' => NULL,
			'user_failed_logins' => 0,
			'user_activation_code' => NULL ,
		));	
			
	}
}