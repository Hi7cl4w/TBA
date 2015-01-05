<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer',function(Blueprint $table)
		{
			$table->integer('customer_id');				
			$table->String('customer_name',128);
			$table->String('customer_mobile',20);
			$table->String('customer_office',20);
			$table->String('customer_email',128);
			$table->Integer('customer_branch');
			$table->Integer('customer_company');
			$table->Integer('customer_assigned_sales');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer');
	}

}
