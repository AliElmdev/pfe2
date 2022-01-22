<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LiaisonOrgDepts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LiaisonOrgDepts', function (Blueprint $table) {
            $table->bigInteger('id_dept')->unsigned();
            $table->bigInteger('id_orga')->unsigned();
            $table->foreign('id_dept')->references('id')->on('departements')->onDelete('cascade');
            $table->foreign('id_orga')->references('id')->on('organisations')->onDelete('cascade');
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
