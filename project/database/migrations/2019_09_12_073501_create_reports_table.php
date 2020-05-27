<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->integer('folder_id')->index('folder_id');
			$table->string('report_name', 455);
			$table->string('report_title', 455);
			$table->string('orientation', 455);
			$table->string('data_source')->comment('Table name');
			$table->string('columns', 1055);
			$table->boolean('status')->nullable()->default(1)->comment('0 for Inactive , 1 for Active');
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
		Schema::drop('reports');
	}

}
