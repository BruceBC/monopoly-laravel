<?php

use Database\Traits\Migratable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayPerPlayerCardsTable extends Migration
{
    use Migratable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_per_player_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id');
            $table->integer('amount');
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
        Schema::dropIfExists('pay_per_player_cards');
    }
}
