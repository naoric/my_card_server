<?php

use Illuminate\Database\Migrations\Migration;

class AddLogoToCards; extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function($table) {
			$table->string('logo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cards', function($table) {
			$table->dropColumn('logo');
		})
	}

}