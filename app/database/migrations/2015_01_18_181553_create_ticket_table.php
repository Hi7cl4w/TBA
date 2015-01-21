<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->String('prefix');
			$table->Integer('Customer_id');
			$table->Integer('Staff_id');
			$table->String('Subject',1000);
			$table->String('Description',5000);
			$table->String('Status',65);
			$table->timestamp('Closing_date');
			$table->String('Remark',5000);
			$table->tinyInteger('Priority');
			$table->String('GeoLocation',300);
			$table->String('Coordinates',300);
			$table->String('Product_vendor',200);
			$table->String('Product_model',200);
			$table->Integer('Purchase_id');
			$table->String('Branch');
			$table->Integer('Rating');
			$table->String('Feedback',5000);
			$table->timestamps();
		});
		Schema::table('customer', function(Blueprint $table)
		{

			$table->String('DOB',100);
			$table->String('Occupation',200);
			$table->String('Gender',10);
			$table->String('Address',1000);
			$table->String('City',200);
			$table->String('State',200);
			$table->String('Pin',20);
			$table->String('Phone',20);
			$table->timestamps();
			$table->dropColumn('customer_mobile');
			$table->dropColumn('customer_branch');
			$table->dropColumn('customer_company');
			$table->dropColumn('customer_office');
			$table->dropColumn('customer_company');
		});
		Schema::table('staff', function(Blueprint $table)
		{

			$table->String('DOB',100);
			$table->String('Designation',200);
			$table->String('Branch',200);
			$table->String('Vendor',200);
			$table->String('Gender',10);
			$table->String('Address',1000);
			$table->String('City',200);
			$table->String('State',200);
			$table->String('Pin',20);
			$table->String('Phone',20);
			$table->timestamps();

		});
		Schema::table('admin', function(Blueprint $table)
		{
			$table->String('Branch',20);
			$table->timestamps();

		});
		Schema::create('products', function(Blueprint $table)
		{
			$table->Integer('id');
			$table->String('Name');
			$table->String('Vendor');
			$table->timestamps();

		});
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->String('Name');
			$table->String('email');
			$table->Integer('product_id');
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
		Schema::drop('ticket');
		Schema::drop('purchases');
		Schema::drop('products');
	}

}
