<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('num')->unsigned();
            $table->integer('num_ppl');
            $table->integer('size')->nullable();
            $table->boolean('avaible');
            $table->string('url_img')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->primary('num');
            $table->foreign('user_id')->references('id')->on('users');
            //$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorios');
    }
}
