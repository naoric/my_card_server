<?php

use Illuminate\Database\Migrations\Migration;

class RemoveSessionTokenFromUsers extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('users', function($table) {
      $table->dropColumn('session_token');
      $table->dropColumn('token_valid_until');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    
  }

}
