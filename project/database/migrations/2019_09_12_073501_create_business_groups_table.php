<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBusinessGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business_groups', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('group_name', 155);
			$table->integer('user_id')->index('user_id');
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
		Schema::drop('business_groups');
	}

}
