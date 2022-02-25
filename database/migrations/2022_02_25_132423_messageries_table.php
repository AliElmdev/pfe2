<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messageries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('Mesasgeries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_marche')->unsigned();
            $table->unsignedBigInteger('recever_id')->unsigned();
            $table->unsignedBigInteger('sender_id')->unsigned();
            $table->text('message');
            $table->enum('type', ['txt', 'f']);
            $table->integer('Vue')->default(0);
            $table->time('vue_at');
            $table->foreign('id_marche')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('recever_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('Messageries');
    }
}
