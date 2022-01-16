<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LiaisonQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LiaisonQuestions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_questionnaire')->unsigned();
            $table->bigInteger('id_question')->unsigned();
            $table->foreign('id_questionnaire')->references('id')->on('questionnaires')->onDelete('cascade');
            $table->foreign('id_question')->references('id')->on('questions')->onDelete('cascade');
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
        //
    }
}
