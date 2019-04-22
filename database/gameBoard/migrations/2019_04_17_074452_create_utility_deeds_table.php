<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilityDeedsTable extends Migration
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
        Schema::create('utility_deeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deed_id');
            $table->integer('single_utility_factor');
            $table->integer('all_utilities_factor');
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
        Schema::dropIfExists('utility_deeds');
    }
}
