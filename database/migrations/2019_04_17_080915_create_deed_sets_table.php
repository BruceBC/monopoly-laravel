<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeedSetsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('deed_sets', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('deed_id');
      $table->integer('set');
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
    Schema::dropIfExists('deed_sets');
  }
}
