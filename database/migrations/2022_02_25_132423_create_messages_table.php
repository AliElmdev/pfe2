<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('Messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_marche')->unsigned();
            $table->unsignedBigInteger('recever_id')->unsigned();
            $table->unsignedBigInteger('sender_id')->unsigned();
            $table->text('message');
            $table->enum('type', ['txt', 'file']);
            $table->Integer('entreprise_id');
            $table->enum('Vue', ['Y', 'N'])->default('N');
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
        Schema::dropIfExists('Messages');
    }
}
