<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserBusinessEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_business_employees', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('business_employee_group_id')->index('business_employee_group_id');
			$table->integer('business_user_id')->index('business_user_id');
			$table->string('first_name', 155);
			$table->string('middle_initial', 55)->nullable();
			$table->string('last_name', 155);
			$table->string('suffix', 55);
			$table->string('gender', 55);
			$table->date('dob');
			$table->string('preferred_name', 155)->nullable();
			$table->string('social_security_number', 155)->nullable();
			$table->string('user_image', 155);
			$table->string('spouse_first_name', 155);
			$table->string('spouse_suffix', 55);
			$table->string('spouse_last_name', 55);
			$table->string('spouse_birth_date', 55);
			$table->string('spouse_children_count', 55);
			$table->string('contact_number', 155);
			$table->string('emergency_number', 155);
			$table->text('address', 65535);
			$table->string('city', 55);
			$table->string('state', 55);
			$table->string('zipcode', 55);
			$table->string('country', 55);
			$table->string('emergency_contact', 155)->nullable();
			$table->string('family_friend_contact', 155)->nullable();
			$table->string('relation', 155)->nullable();
			$table->string('sibling_email', 155)->nullable();
			$table->string('company_name', 155)->nullable();
			$table->string('designation', 155)->nullable();
			$table->decimal('employment_id', 15)->nullable();
			$table->string('employment_type', 55)->nullable();
			$table->string('employment_status', 55)->nullable();
			$table->string('benefit_info', 55)->nullable();
			$table->string('benefits_vendor', 55)->nullable();
			$table->string('assigned_benefits_vendor', 55)->nullable();
			$table->string('action_status', 55)->default('In-Progress');
			$table->string('terminate_status', 55);
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
		Schema::drop('user_business_employees');
	}

}
