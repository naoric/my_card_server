<?php

use Illuminate\Database\Migrations\Migration;

class AddRegistrationTokenToUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      Schema::table('users', function($table) {
      $table->string('registration_token', 40);
    });
  }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}