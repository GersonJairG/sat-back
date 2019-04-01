<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TimeBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('time_blocks', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_dependence')->unsigned();
        $table->text('week');
        $table->timestamps();

        //relation with type_turn_states
        $table->foreign('id_dependence')->references('id')->on('dependences')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_blocks');
    }
}
