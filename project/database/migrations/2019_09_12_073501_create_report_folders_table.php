<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportFoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_folders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('folder_name');
			$table->integer('user_id')->index('user_id');
			$table->boolean('status')->nullable()->default(1)->comment('0 for Inactive,1 for Active');
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
		Schema::drop('report_folders');
	}

}
