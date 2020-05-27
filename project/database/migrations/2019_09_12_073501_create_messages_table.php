<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('from_user_id')->nullable()->index('from_user_id');
			$table->string('to_user_id', 1000)->nullable();
			$table->string('to_cc', 1000)->nullable();
			$table->string('to_bcc', 1000)->nullable();
			$table->integer('mail_category_id')->nullable()->index('mail_category_id');
			$table->string('subject')->nullable();
			$table->text('message', 65535)->nullable();
			$table->boolean('status')->default(1);
			$table->date('date')->nullable();
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
		Schema::drop('messages');
	}

}
