<?php

use Database\Traits\Migratable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeedsTable extends Migration
{
    use Migratable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('space_id');
            $table->integer('price');
            $table->integer('mortgage');
            $table->integer('unmortgage');
            $table->integer('set');
            $table->enum('deed', ['street', 'railroad', 'utility']);
            $table->string('tag', 255)->unique();
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
        Schema::dropIfExists('deeds');
    }
}
