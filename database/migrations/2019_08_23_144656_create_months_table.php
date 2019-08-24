<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('months', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('schoolyear');
			$table->integer('1')->default(0);
			$table->integer('2')->default(0);
			$table->integer('3')->default(0);
			$table->integer('4')->default(0);
			$table->integer('5')->default(0);
			$table->integer('6')->default(0);
			$table->integer('7')->default(0);
			$table->integer('8')->default(0);
			$table->integer('9')->default(0);
			$table->integer('10')->default(0);
			$table->integer('11')->nullable()->default(5);
			$table->integer('12')->nullable()->default(0);
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
		Schema::drop('months');
	}

}
