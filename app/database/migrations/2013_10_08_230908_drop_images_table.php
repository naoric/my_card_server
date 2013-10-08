<?php

use Illuminate\Database\Migrations\Migration;

class DropImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('images');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function($table) {
			$table->increment('id');
			$table->binary('image');
			$table->string('mime', 15);
		});
	}

}