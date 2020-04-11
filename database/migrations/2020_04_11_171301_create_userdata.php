<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('userdata', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('age')->nullable();
            $table->enum('gendar' ,['male' , 'female'])->nullable();
            $table->string('mobile')->nullable();
            $table->string('location')->nullable();
            $table->string('religion')->nullable();
            $table->string('bio')->nullable();
            $table->string('nationality')->nullable();
            $table->string('additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userdata');

    }
}
