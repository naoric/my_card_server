<?php

use Illuminate\Database\Migrations\Migration;

class DropCards extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::drop('locations');
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
