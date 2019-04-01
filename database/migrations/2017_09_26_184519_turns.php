<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class turns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
        $table->increments('id');
        $table->string('id_firebase');
        $table->date('date');
        $table->time('hour');
        $table->string('detail',500)->nullable();
        $table->string('turn_type');// urgente(viejitas,embarazadas) o normal
        $table->integer('id_turn_state')->unsigned();
        $table->integer('id_user')->unsigned();
        $table->integer('id_service_type')->unsigned();
        $table->integer('id_semester')->unsigned();
        $table->integer('id_admin_assigned')->unsigned();
        $table->timestamps();

        //relation with service_types
        $table->foreign('id_service_type')->references('id')->on('service_types')->onDelete('cascade');
        
        //relation with users
        $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        
        //relation with type_turn_states
        $table->foreign('id_turn_state')->references('id')->on('turn_states')->onDelete('cascade');

        //relation with type_turn_states
        $table->foreign('id_semester')->references('id')->on('semesters')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
