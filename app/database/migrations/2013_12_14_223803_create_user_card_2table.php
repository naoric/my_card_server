<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCard2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('card_user', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->index();
			$table->integer('card_id')->unsigned()->index();
			$table->integer('biz_points')->unsigned();
			$table->integer('purchase_count')->unsigned();

            $table->primary(['user_id', 'card_id']);
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('card_user');
	}

}