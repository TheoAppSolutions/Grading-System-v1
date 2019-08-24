<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrades7Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grades_7', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true)->unsigned();
			$table->integer('student_id')->index('grades_student_id_foreign');
			$table->integer('user_id')->index('grades_user_id_foreign');
			$table->string('subject_id');
			$table->integer('quarter');
			$table->string('schoolyear')->default('0');
			$table->float('midquarter', 10, 0)->nullable()->default(0);
			$table->float('final', 10, 0)->nullable()->default(0);
			$table->float('effort', 10, 0)->nullable()->default(0);
			$table->float('deportment', 10, 0)->nullable()->default(0);
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
		Schema::drop('grades_7');
	}

}
