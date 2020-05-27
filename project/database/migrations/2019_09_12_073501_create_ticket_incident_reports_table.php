<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketIncidentReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_incident_reports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ticket_number', 155);
			$table->boolean('request_type')->comment('0 for Data,1 for Application ,2 for Access ,3 for Others');
			$table->string('title', 155);
			$table->text('description', 65535);
			$table->boolean('severity')->comment('1 for Results to systems downtime or may lead to financial loss,2 for Affects for multple users and other applications,3 for Affects multiple users and customers , 4 for Affects single user');
			$table->integer('assigned_to');
			$table->text('rootcause', 65535);
			$table->text('resolution', 65535);
			$table->string('attachment_name', 155);
			$table->string('attachment_path', 155);
			$table->string('file_type', 155);
			$table->boolean('status')->default(0)->comment('0 for In-Progress.1 for closed');
			$table->integer('created_by');
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
		Schema::drop('ticket_incident_reports');
	}

}
