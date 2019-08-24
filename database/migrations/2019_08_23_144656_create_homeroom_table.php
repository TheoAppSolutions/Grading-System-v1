<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeroomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homeroom', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('advisory')->default('');
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('user2_id')->unsigned()->nullable();
			$table->string('section')->default('');
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
		Schema::drop('homeroom');
	}

}
