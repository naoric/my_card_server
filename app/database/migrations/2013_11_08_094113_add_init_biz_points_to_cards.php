<?php

use Illuminate\Database\Migrations\Migration;

class AddInitBizPointsToCards extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('cards', function($table) {
      $table->integer('init_biz_points')->unsigned()->default(0);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('cards', function($table) {
      $table->dropColumn('init_biz_points');
    });
  }

}
