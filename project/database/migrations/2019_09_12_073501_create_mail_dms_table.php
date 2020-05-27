<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailDmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_dms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('message_table_id')->index('message_table_id');
			$table->string('document');
			$table->string('documnet_path');
			$table->boolean('status')->default(1)->comment('0 for Inactive,1 for Active');
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
		Schema::drop('mail_dms');
	}

}
