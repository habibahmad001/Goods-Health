<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->integer('policy_id')->index('policy_id');
			$table->string('payment_plan', 55);
			$table->string('card_name', 55);
			$table->string('card_number', 155);
			$table->string('expiry_date', 55);
			$table->string('country', 55);
			$table->string('postal_code', 55);
			$table->string('transaction_number', 155);
			$table->decimal('amount', 15);
			$table->integer('transaction_status');
			$table->integer('transaction_response_msg');
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
		Schema::drop('payments');
	}

}
