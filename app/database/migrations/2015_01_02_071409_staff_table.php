<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff',function(Blueprint $table)
		{
			$table->Integer('staff_id');
			$table->String('designation' , 256 );
			$table->String('staff_mobile',20);
			$table->String('staff_office',256);
			$table->String('staff_location');
			$table->integer('staff_location_pin');
			$table->Integer('staff_branch');
			$table->Integer('staff_company');
			$table->Integer('staff_active');
			$table->tinyInteger('work_allocated')->default(0);


			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
