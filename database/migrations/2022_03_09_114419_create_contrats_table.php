<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produits')->unsigned();
            $table->integer('id_marche')->unsigned();
            $table->bigInteger('id_entreprise')->unsigned();
            $table->bigInteger('id_postulation')->unsigned();
            $table->double('prix');
            $table->foreign('id_produits')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('id_marche')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('id_entreprise')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('id_postulation')->references('id')->on('postulations')->onDelete('cascade');
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
        Schema::dropIfExists('contrats');
    }
}
