<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_info', function(Blueprint $table)
		{
			$table->bigInteger('entry_id', true);
			$table->integer('user_id');
			$table->date('birthdate')->nullable();
			$table->string('contact')->nullable();
			$table->string('email')->nullable()->unique('users_info_email_uindex');
			$table->string('address')->nullable();
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
		Schema::drop('users_info');
	}

}
