<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_fields', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->integer('student_id')->nullable();
			$table->string('field_name')->nullable();
			$table->string('field_value')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students_fields');
	}

}
