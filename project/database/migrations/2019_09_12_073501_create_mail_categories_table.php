<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_categories', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->integer('parent_category_id');
			$table->string('category_name');
			$table->boolean('status')->default(1)->comment('0 For Inactive,1 For Active');
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
		Schema::drop('mail_categories');
	}

}
