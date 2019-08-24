<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects_user', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('subject_id');
			$table->bigInteger('user_id')->unsigned()->nullable();
			$table->bigInteger('user2_id')->unsigned()->nullable();
			$table->string('schoolyear');
			$table->string('section')->nullable()->default('');
			$table->string('semester')->nullable()->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects_user');
	}

}
