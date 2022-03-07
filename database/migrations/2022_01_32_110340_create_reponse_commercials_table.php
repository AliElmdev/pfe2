<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_commercials', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('marche_id')->unsigned();
            $table->bigInteger('produit_id')->unsigned();
            $table->enum('type',['article','variante']);
            $table->string('devis');
            $table->integer('prix');
            $table->integer('note');
            $table->BigInteger('reponses_commercial_id')->unsigned();
            // $table->foreign('marche_id')->references('id')->on('marches')->onDelete('cascade');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->foreign('reponses_commercial_id')->references('id')->on('reponses_commercials')->onDelete('cascade');
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
        Schema::dropIfExists('reponse_commercials');
    }
}
