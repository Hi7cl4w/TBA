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
			$table->increments('id');
			$table->timestamps();
			Ticket_Idint(10)No
Ticket_Customer_Idint(10)No
Ticket_Unique_Codevarchar(1000)No
Ticket_Emailvarchar(1000)No
Ticket_Descriptionvarchar(1000)No
Ticket_Staff_Idint(10)No
Ticket_Statusint(10)No
Ticket_Service_Namevarchar(1000)No
Ticket_Branch_Idint(10)No
Print view - phpMyAdmin 4.1.14http://localhost/phpmyadmin/db_datadict.php?db=call&token=d22f1afa...
4 of 512/23/2014 5:11 PM
Ticket_DatedateNo
Ticket_TimetimeNo
Ticket_Remarkvarchar(1000)No
Ticket_Closing_DatedatetimeNo
Ticket_Priorityvarchar(100)No
Ticket_Contact_Namevarchar(1000)No
Ticket_Contact_Emailvarchar(1000)No
Ticket_Contact_Novarchar(1000)No
Ticket_Subjectvarchar(1000)No
Ticket_Geo_Locationvarchar(1000)No
Ticket_Problem_Idint(10)No
Ticket_Codevarchar(1000)No
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
	}

}
