<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_questions', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('marche_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();
            $table->string('reponse');
            $table->BigInteger('reponses_question_id')->unsigned();
            // $table->foreign('marche_id')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('reponses_question_id')->references('id')->on('reponses_questions')->onDelete('cascade');
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
        Schema::dropIfExists('reponse_questions');
    }
}
