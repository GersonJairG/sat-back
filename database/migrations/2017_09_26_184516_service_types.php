<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');                
        $table->string('description');
        $table->string('average_time');
        $table->integer('id_service')->unsigned();
        $table->timestamps();

        //relation with services
        $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
