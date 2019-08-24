<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAwardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('awards', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned()->index('awards_student_id_foreign');
			$table->string('subject_id')->index('awards_subject_id_foreign');
			$table->string('schoolyear');
			$table->string('gender');
			$table->string('section')->default('');
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
		Schema::drop('awards');
	}

}
