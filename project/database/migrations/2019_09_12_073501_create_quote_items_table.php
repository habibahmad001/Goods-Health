<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuoteItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quote_items', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('quote_id')->index('quote_id');
			$table->integer('category_id')->index('category_id');
			$table->integer('policy_id')->nullable()->index('policy_id');
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
		Schema::drop('quote_items');
	}

}
