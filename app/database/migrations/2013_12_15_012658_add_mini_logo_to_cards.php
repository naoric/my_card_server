<?php

use Illuminate\Database\Migrations\Migration;

class AddMiniLogoToCards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function($table) {
		    $table->string('thumbnail')->nullable();
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
		    $table->dropColumn('thumbnail');
		});
	}

}