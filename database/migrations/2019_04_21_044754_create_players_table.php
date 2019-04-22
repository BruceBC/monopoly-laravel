<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    use Migratable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('space_id');
            $table->integer('cash');
            $table->boolean('active')->default(false);
            $table->boolean('turn')->default(false);
            $table->boolean('jailed')->default(false);
            $table->unsignedInteger('double_roll_count')->default(0);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();

            $this->makeForeign($table, ['user_id', 'id', 'users']);
            $this->makeForeign($table, ['session_id', 'id', 'sessions']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
