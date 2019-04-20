<?php

use Database\Traits\Migratable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJailSpacesTable extends Migration
{
    use Migratable;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jail_spaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('space_id');
            $table->integer('rolls');
            $table->integer('early_fee');
            $table->integer('late_fee');
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
        Schema::dropIfExists('jail_spaces');
    }
}
