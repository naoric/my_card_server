<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatedCardsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    $query = <<<EOT
        CREATE TABLE cards (
          id INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
          cname VARCHAR (50) NOT NULL,
          description TEXT,
          logo VARCHAR (60),
          address VARCHAR (255) NOT NULL,
          latlng POINT NOT NULL,
          created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
          updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
          PRIMARY KEY (id),
          SPATIAL KEY location (latlng)
        ) ENGINE = MYISAM DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
EOT;

    DB::statement($query);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('cards');
  }

}
