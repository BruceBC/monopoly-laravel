<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionCardsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('collection_cards', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('card_id');
      $table->integer('reward');
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
    Schema::dropIfExists('collection_cards');
  }
}
