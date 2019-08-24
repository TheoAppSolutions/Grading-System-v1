<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_settings', function(Blueprint $table)
		{
			$table->integer('entry_id', true);
			$table->integer('user_id')->unique('user_settings_user_id_uindex');
			$table->text('settings')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_settings');
	}

}
