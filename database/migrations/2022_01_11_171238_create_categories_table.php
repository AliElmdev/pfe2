<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_domaine')->unsigned();
            $table->string('name');
<<<<<<< HEAD
            $table->bigInteger('id_domaine')->unsigned();
            $table->foreign('id_domaine')->references('id_domaine')->on('domaines')->onDelete('cascade');
=======
            $table->foreign('id_domaine')->references('id')->on('domaines')->onDelete('cascade');
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
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
        Schema::dropIfExists('categories');
    }
}
