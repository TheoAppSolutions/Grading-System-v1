<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsUnitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects_units', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->string('subject_id')->nullable();
			$table->float('units', 10, 0);
			$table->string('schoolyear')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects_units');
	}

}
