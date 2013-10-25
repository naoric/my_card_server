<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('codes', function(Blueprint $table) {
      $table->increments('id');
      $table->string('code')->unique();
      $table->integer('card_id')->unsigned()->index();
      
      $table->foreign('card_id')->references('id')->on('cards');
      
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::drop('codes');
  }

}
