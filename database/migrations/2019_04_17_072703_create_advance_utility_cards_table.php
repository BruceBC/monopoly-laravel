<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceUtilityCardsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('advance_utility_cards', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('advance_card_id');
      $table->integer('factor');
      $table->timestamps();

      $this->makeForeign($table, ['advance_card_id', 'id', 'advance_cards']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('advance_utility_cards');
  }
}
