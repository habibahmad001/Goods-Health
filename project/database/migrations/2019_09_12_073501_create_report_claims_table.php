<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportClaimsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_claims', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->integer('policy_id')->index('policy_id');
			$table->integer('organization_id')->index('organization_id');
			$table->string('owner_damaged_property');
			$table->string('address', 155);
			$table->string('phone_number', 55);
			$table->string('injured_party_information', 155);
			$table->string('injured_person_name', 155);
			$table->string('injured_person_address');
			$table->string('injured_person_number', 55);
			$table->string('injured_person_alternate_number', 55);
			$table->date('injured_person_dob');
			$table->string('injured_person_guardian', 155);
			$table->date('damage_injury_date');
			$table->string('location_of_incident', 155);
			$table->string('activity', 155);
			$table->string('status', 55)->nullable()->default('PENDING');
			$table->string('description_of_accident');
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
		Schema::drop('report_claims');
	}

}
