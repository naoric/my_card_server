<?php

use Illuminate\Database\Migrations\Migration;

class DropCardsNew extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::drop('user_card');
    Schema::drop('codes');
    Schema::drop('cards');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    //
  }

}
