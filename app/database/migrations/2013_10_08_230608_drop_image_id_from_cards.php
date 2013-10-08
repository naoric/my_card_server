<?php

use Illuminate\Database\Migrations\Migration;

class DropImageIdFromCards extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cards', function($table) {
			$table->dropForeign('cards_image_id_foreign');
			$table->dropColumn('image_id');
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