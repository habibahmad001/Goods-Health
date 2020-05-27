<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 155);
			$table->string('subject', 55);
			$table->timestamps();
			$table->text('description', 65535);
			$table->string('email', 155);
			$table->string('contact_number', 55);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quotes');
	}

}
