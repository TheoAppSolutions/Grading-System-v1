<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthsTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('months_terms', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('schoolyear')->nullable();
			$table->float('term1', 10, 0)->nullable();
			$table->float('term2', 10, 0)->nullable();
			$table->float('term3', 10, 0)->nullable();
			$table->float('term4', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('months_terms');
	}

}
