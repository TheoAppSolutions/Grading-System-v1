<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendanceTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendance_terms', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true);
			$table->integer('student_id')->nullable();
			$table->string('schoolyear')->nullable();
			$table->float('A1', 10, 0)->nullable();
			$table->float('A2', 10, 0)->nullable();
			$table->float('A3', 10, 0)->nullable();
			$table->float('A4', 10, 0)->nullable();
			$table->float('T1', 10, 0)->nullable();
			$table->float('T2', 10, 0)->nullable();
			$table->float('T3', 10, 0)->nullable();
			$table->float('T4', 10, 0)->nullable();
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
		Schema::drop('attendance_terms');
	}

}
