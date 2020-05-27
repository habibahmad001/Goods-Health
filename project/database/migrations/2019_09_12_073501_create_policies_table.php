<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policies', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('organization_id')->index('organization_id');
			$table->string('policy_name', 155);
			$table->string('policy_type', 55);
			$table->string('policy_periods', 55);
			$table->decimal('policy_value', 15);
			$table->text('policy_description', 65535);
			$table->boolean('status')->comment('0 for INACTIVE,1 for ACTIVE');
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
		Schema::drop('policies');
	}

}
