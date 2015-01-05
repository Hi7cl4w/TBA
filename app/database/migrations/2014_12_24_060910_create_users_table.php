<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->String('username' , 64 );
			$table->String('password' , 256 );
			$table->String('user_email' , 64 );
			$table->String('user_rememberme_token' , 64 )->nullable();
			$table->tinyInteger('user_failed_logins')->default(0);
			$table->String('user_activation_code' , 40 )->nullable();
			$table->timestamp('user_reset_timestamp')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
