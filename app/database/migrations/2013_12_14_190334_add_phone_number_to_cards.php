<?php

use Illuminate\Database\Migrations\Migration;

class AddPhoneNumberToCards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function($table) {
		    $table->string('phone_number', 15);
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
		    $table->dropColumn('phone_number');
        });
	}

}
