<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoSpacesTable extends Migration
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
        Schema::create('go_spaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('space_id');
            $table->integer('passing_price');
            $table->integer('landing_price');
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
        Schema::dropIfExists('go_spaces');
    }
}
