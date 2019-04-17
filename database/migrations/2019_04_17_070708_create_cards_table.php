<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
  use Migratable;

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cards', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('space_id');
      $table->text('rule');
      $table->enum('action', [
        'pay',
        'collect',
        'bail',
        'advance',
        'repair',
        'jail',
        'retreat',
        'pay_per_player',
      ]);
      $table->timestamps();

      $this->makeForeign($table, ['space_id', 'id', 'spaces']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cards');
  }
}
