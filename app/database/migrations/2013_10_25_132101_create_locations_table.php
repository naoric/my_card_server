<?php

use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    DB::statement("CREATE TABLE IF NOT EXISTS locations ("
            . "id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
            . "card_id INT(10) UNSIGNED NOT NULL,"
            . "latlng Point NOT NULL,"
            . "description VARCHAR(255),"
            . "SPATIAL INDEX(location),"
            . "FOREIGN KEY (card_id) REFERENCES cards(id)"
            . ") Engine=MyISAM;");
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('locations');
  }

}
