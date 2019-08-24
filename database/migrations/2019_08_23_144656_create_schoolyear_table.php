<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolyearTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schoolyear', function(Blueprint $table)
		{
			$table->increments('entry_id');
			$table->string('active');
			$table->string('schoolyear');
			$table->integer('schoolyear_start')->nullable();
			$table->integer('schoolyear_end')->nullable();
			$table->text('school_days')->nullable();
			$table->string('days_settings')->nullable()->default('4');
			$table->string('card_template')->nullable()->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schoolyear');
	}

}
