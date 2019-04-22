<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetDeedsTable extends Migration
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
        Schema::create('street_deeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deed_id');
            $table->string('color', 7);
            $table->integer('rent');
            $table->integer('collective_rent'); // all colors in set rent
            $table->integer('hotel_rent');
            $table->integer('house_cost');
            $table->integer('hotel_cost');
            $table->string('tag', 255)->unique();
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
        Schema::dropIfExists('street_deeds');
    }
}
