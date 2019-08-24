<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnrollmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrollment', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true);
			$table->integer('student_id');
			$table->string('schoolyear')->default('2018');
			$table->string('gradelevel')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enrollment');
	}

}
