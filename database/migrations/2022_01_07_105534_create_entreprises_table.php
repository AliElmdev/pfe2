<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('social_name');
            $table->string('commercial_name');
            $table->string('company_type');
            $table->string('ice_num');
            $table->string('siret_num');
            $table->string('adresse');
            $table->string('zip_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone');  
            $table->boolean('ismoroccan');
            $table->integer('effective_total');
            $table->date('iscreated');
            $table->string('doc_cau');
            $table->string('doc_status_entreprise');
            $table->string('doc_registre');
            $table->string('doc_cpc');
            $table->string('activite_entreprise');
            $table->string('certificats');
            $table->string('ref_clients');
            $table->boolean('rules_accept');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
