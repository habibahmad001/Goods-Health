<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuoteRepliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quote_replies', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quote_id')->index('quote_id');
			$table->string('subject', 155);
			$table->text('message', 65535);
			$table->string('attachment_name', 55)->nullable();
			$table->string('attachment_type', 55)->nullable();
			$table->string('attachment_path', 55)->nullable();
			$table->integer('reply_by_user_id')->index('reply_by_user_id');
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
		Schema::drop('quote_replies');
	}

}
