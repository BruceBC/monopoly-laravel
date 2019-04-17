<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseRentsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('house_rents', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('street_deed_id');
      $table->integer('single');
      $table->integer('double');
      $table->integer('triple');
      $table->integer('quad');
      $table->timestamps();

      $this->makeForeign($table, ['street_deed_id', 'id', 'street_deeds']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('house_rents');
  }
}
