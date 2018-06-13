<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price');
            $table->integer('time');
            $table->integer('klient_id');
            $table->text('comments');
            $table->text('items');
            $table->tinyint('storage'); // tinyint рассмотреть
            $table->tinyint('status')->default('1');
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
        Schema::drop('zalogs');
    }
}
