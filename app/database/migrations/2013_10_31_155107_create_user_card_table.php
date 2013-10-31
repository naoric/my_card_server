<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_card', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->integer('card_id')->unsigned()->index();
			$table->integer('biz_points')->unsigned();
			$table->integer('purchase_count')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('card_id')->references('id')->on('cards');
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
		Schema::drop('user_card');
	}

}
