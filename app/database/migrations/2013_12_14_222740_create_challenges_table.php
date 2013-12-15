<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('challenges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 50);
			$table->string('description');
			$table->integer('points_global')->unsigned()->default(0);
			$table->integer('points_private')->unsigned()->default(0);
			$table->integer('users_limit')->default(-1);
			$table->timestamp('start_time');
			$table->timestamp('end_time');
			$table->integer('card_id')->unsigned()->index('fk_cards');
//			$table->foreign('card_id')->references('id')->on('cards');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('challenges');
	}

}