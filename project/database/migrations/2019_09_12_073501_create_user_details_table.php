<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->string('first_name', 155);
			$table->string('middle_initial', 55)->nullable();
			$table->string('last_name', 155);
			$table->string('suffix', 55);
			$table->string('gender', 55);
			$table->date('dob');
			$table->string('preferred_name', 155)->nullable();
			$table->string('social_security_number', 155)->nullable();
			$table->string('user_image', 155);
			$table->string('contact_number', 155);
			$table->string('alternate_number', 155)->nullable();
			$table->string('emergency_number', 155);
			$table->text('address', 65535);
			$table->string('state', 55);
			$table->string('zipcode', 55);
			$table->string('country', 55);
			$table->string('company_name', 155)->nullable();
			$table->string('designation', 155)->nullable();
			$table->decimal('annual_income', 15)->nullable();
			$table->string('employment_type', 55)->nullable();
			$table->text('company_address', 65535)->nullable();
			$table->string('company_state', 55)->nullable();
			$table->string('company_city', 55)->nullable();
			$table->string('company_zip', 55)->nullable();
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
		Schema::drop('user_details');
	}

}
