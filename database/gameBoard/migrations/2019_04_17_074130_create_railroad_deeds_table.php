<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRailroadDeedsTable extends Migration
{
    use Migratable;

    protected $connection = 'mysql_game_board';

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
            $table->integer('two_railroads_owned_rent');
            $table->integer('three_railroads_owned_rent');
            $table->integer('four_railroads_owned_rent');
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
