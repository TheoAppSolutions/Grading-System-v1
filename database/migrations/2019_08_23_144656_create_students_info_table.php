<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_info', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true)->unsigned();
			$table->integer('student_id')->unique('students_info_student_id_uindex');
			$table->date('birthdate')->nullable();
			$table->string('houseteam')->nullable();
			$table->string('contact')->nullable();
			$table->string('address')->nullable();
			$table->string('email')->nullable();
			$table->string('guardian')->nullable();
			$table->string('occupation')->nullable();
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
		Schema::drop('students_info');
	}

}
