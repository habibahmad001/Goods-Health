<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketChangeRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_change_requests', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ticket_number', 155);
			$table->boolean('request_type')->comment('0 for Data,1 for Application ,2 for Access ,3 for Others');
			$table->string('title', 155);
			$table->text('description', 65535);
			$table->boolean('priority')->comment('1 for Major, 2 for Minor');
			$table->integer('assigned_to');
			$table->text('related_incident', 65535);
			$table->text('deployment_procedure', 65535);
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
		Schema::drop('ticket_change_requests');
	}

}
