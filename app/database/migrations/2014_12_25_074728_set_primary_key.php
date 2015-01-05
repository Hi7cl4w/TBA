<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetPrimaryKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('customer',function(Blueprint $table)
		{
			$table->primary('customer_id')->unsigned();
			
		});
		Schema::table('staff',function(Blueprint $table)
		{
			$table->primary('staff_id')->unsigned();

		});
		Schema::table('admin',function(Blueprint $table)
		{
			$table->primary('admin_id')->unsigned();

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('customer',function(Blueprint $table)
		{
			$table->dropColumn('customer_id');
			$table->Integer('customer_id');
			
		});
		Schema::table('staff',function(Blueprint $table)
		{
			$table->dropColumn('staff_id');
			$table->Integer('staff_id');

		});
		Schema::table('admin',function(Blueprint $table)
		{
			$table->dropColumn('admin_id');
			$table->Integer('admin_id');

		});
	}

}
