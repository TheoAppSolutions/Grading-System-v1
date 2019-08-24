<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcements', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->string('title')->nullable();
			$table->string('description');
			$table->integer('from_user_id');
			$table->string('to_user_id')->nullable();
			$table->string('attached_files')->nullable();
			$table->date('date_start')->nullable();
			$table->date('date_end')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announcements');
	}

}
