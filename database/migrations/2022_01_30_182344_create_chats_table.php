<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        // Schema::create('chats', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('from_user');
        //     $table->unsignedInteger('to_user');
        //     $table->text('content');
        //     $table->timestamps();
        //     $table->foreign('from_user')->references('id')->on('users');
        //     $table->foreign('to_user')->references('id')->on('users');
        // });


        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_marches')->unsigned();
            $table->unsignedBigInteger('sender_id')->unsigned();
            $table->unsignedBigInteger('receiver_id')->unsigned();
            $table->text('message');
            $table->enum('type', ['txt', 'f']);
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
        Schema::dropIfExists('chats');
    }
}
