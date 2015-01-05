<?php

class UsergroupTableSeeder extends Seeder{
	public function run()
	{
		DB::table('user_group')->insert(array(
			array( 'user_group_id' => 1, 'user_group_name'=>'Customer'),
			array( 'user_group_id' => 2, 'user_group_name'=>'Staff'),
			array( 'user_group_id' => 3, 'user_group_name'=>'Admin')
			));
	}
}