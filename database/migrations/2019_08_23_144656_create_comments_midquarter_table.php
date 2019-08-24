<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsMidquarterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments_midquarter', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true);
			$table->integer('student_id');
			$table->string('schoolyear')->nullable();
			$table->integer('quarter')->nullable();
			$table->text('comments')->nullable();
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
		Schema::drop('comments_midquarter');
	}

}
