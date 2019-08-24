<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsSectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_section', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->integer('student_id')->nullable();
			$table->string('section')->nullable();
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
		Schema::drop('students_section');
	}

}
