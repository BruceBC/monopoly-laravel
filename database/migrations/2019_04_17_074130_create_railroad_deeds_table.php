<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRailroadDeedsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('railroad_deeds', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('deed_id');
      $table->integer('rent');
      $table->integer('double_rent');
      $table->integer('triple_rent');
      $table->integer('quad_rent');
      $table->timestamps();

      $this->makeForeign($table, ['deed_id', 'id', 'deeds']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('railroad_deeds');
  }
}