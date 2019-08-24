<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsExcludedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects_excluded', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->integer('student_id');
			$table->string('subject_id');
			$table->string('schoolyear');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects_excluded');
	}

}
