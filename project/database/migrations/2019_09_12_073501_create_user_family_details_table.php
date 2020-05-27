<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserFamilyDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_family_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->string('first_name', 155);
			$table->string('last_name', 55);
			$table->string('phone', 55);
			$table->string('designation', 55);
			$table->string('employment_type', 55);
			$table->string('location', 155);
			$table->string('email', 155);
			$table->boolean('status')->comment('0 for INACTIVE,1 for ACTIVE');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('update_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_family_details');
	}

}
