<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairCardsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('repair_cards', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('card_id');
      $table->integer('house_charge');
      $table->integer('hotel_charge');
      $table->timestamps();

      $this->makeForeign($table, ['card_id', 'id', 'cards']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('repair_cards');
  }
}
