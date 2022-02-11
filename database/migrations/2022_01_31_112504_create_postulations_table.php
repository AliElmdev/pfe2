<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulations', function (Blueprint $table) {
            $table->id();
            $table->integer('marche_id')->unsigned();
            $table->bigInteger('questions_id')->unsigned();
            $table->bigInteger('commercials_id')->unsigned();
            $table->integer('etat')->unsigned();
            $table->foreign('marche_id')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('commercials_id')->references('id')->on('reponses_commercials')->onDelete('cascade');
            $table->foreign('questions_id')->references('id')->on('reponses_questions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('postulations');
    }
}
