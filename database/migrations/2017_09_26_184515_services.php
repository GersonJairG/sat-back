<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Services extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('id_dependence')->unsigned();
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
        Schema::dropIfExists('services');
    }
}
