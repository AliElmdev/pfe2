<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_categorie')->unsigned();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->date('limit_date')->nullable();
            $table->date('affichage_date')->nullable();
            $table->integer('etat')->default(0);
            $table->string('c_charge', 255);
            $table->integer('id_chef')->nullable();
            $table->integer('id_achat')->nullable();
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('marches');
    }
}
