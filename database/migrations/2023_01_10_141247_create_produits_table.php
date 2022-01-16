<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->integer('marche_id')->unsigned();
            $table->string('nom');
            $table->string('commentaire');
            $table->integer('qte');
            $table->enum('unit', ['m', 'kg','u']);
            $table->enum('serv_prod', ['service', 'produit']);
            $table->foreign('id_marche')->references('id')->on('marches')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
