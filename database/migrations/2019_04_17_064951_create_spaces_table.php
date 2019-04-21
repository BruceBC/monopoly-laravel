<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpacesTable extends Migration
{
    use Migratable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('game_id');
            $table->string('name', 100);
            $table->enum('tile', [
                'deed',
                'go',
                'tax',
                'parking',
                'visiting',
                'jail',
                'chance',
                'community',
            ]);
            $table->timestamps();

            $this->makeForeign($table, ['game_id', 'id', 'games']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spaces');
    }
}
