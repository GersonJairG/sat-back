<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('users', function (Blueprint $table) {
             $table->increments('id');
             $table->string('document');
             $table->string('name');
             $table->string('lastname');
             $table->string('email')->unique();
             $table->string('phone');
             $table->integer('id_role')->unsigned();
             $table->integer('id_user_state')->unsigned();
             $table->integer('id_dependence')->unsigned();
             $table->string('password');
             $table->rememberToken();
             $table->timestamps();

             //relation with user_types
             $table->foreign('id_role')->references('id')->on('roles')->onDelete('cascade');
             //relation with user_states
             $table->foreign('id_user_state')->references('id')->on('user_states')->onDelete('cascade');
             //relation with dependence
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
         Schema::dropIfExists('users');
     }
}
