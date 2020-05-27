<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceRequestTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_request_tickets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ticket_number', 155);
			$table->boolean('request_type')->comment('0 for Data,1 for Application ,2 for Access ,3 for Others');
			$table->string('title', 155);
			$table->text('description', 65535);
			$table->boolean('priority')->comment('0 for Major,0 for Minor');
			$table->integer('assigned_to');
			$table->text('procedures', 65535)->nullable();
			$table->string('attachment_name', 155)->nullable();
			$table->string('attachment_path', 155)->nullable();
			$table->string('file_type', 155)->nullable();
			$table->boolean('status')->comment('0 for In-Progress.1 for closed');
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
		Schema::drop('service_request_tickets');
	}

}
