<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmenasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smenas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('started_at');
            $table->dateTime('ended_at')->nullable();
            $table->integer('user_id');
            $table->integer('lombard_id');
            $table->integer('status')->default('1');
            $table->integer('before_cash');
            $table->integer('after_cash')->nullable();
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
        Schema::drop('smenas');
    }
}
