<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true)->unsigned();
			$table->integer('student_id')->unique('students_student_id_uindex');
			$table->string('student_lrn', 20)->nullable();
			$table->string('firstname');
			$table->string('middlename')->nullable();
			$table->string('lastname');
			$table->string('suffix')->default('');
			$table->string('section')->default('');
			$table->string('gender');
			$table->integer('active')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
