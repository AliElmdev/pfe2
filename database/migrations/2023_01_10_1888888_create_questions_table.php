<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
<<<<<<< HEAD:database/migrations/2023_01_10_1888888_create_questions_table.php
            $table->string('options');
            $table->string('description');
            $table->enum('type', ['cr', 'cm', 'f', 'on']);
=======
            $table->string('options')->default(null);
            $table->string('description')->default(null);
            $table->enum('type',['cr','cm','f','on']);
>>>>>>> ab1b915b01376fa5a7f54c2808da3bbf0780e3da:database/migrations/2023_01_10_141716_create_questions_table.php
            $table->bigInteger('section_id')->unsigned();
            $table->integer('marche_id')->unsigned();
            $table->foreign('marche_id')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
