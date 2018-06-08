<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klients', function (Blueprint $table) {
            $table->increments('id');
             $table->string('surname', 100);
             $table->string('name', 100);
             $table->string('patronymic', 100);
             $table->date('date_of_birth');
             $table->string('punkt', 100);
             $table->string('street', 100);
             $table->integer('home');
             $table->string('location_of_birth', 100);
             $table->string('location_of_fact', 100);
             $table->string('phone', 100);
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
        Schema::drop('klients');
    }
}
