<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('nom');
            $table->bigInteger('id_grand_section')->unsigned();
            $table->foreign('id_grand_section')->references('id')->on('grand_sections')->onDelete('cascade');
=======
            $table->string('nom_section');
            $table->enum('type_section',["RFI","RFQ"]);
>>>>>>> ab1b915b01376fa5a7f54c2808da3bbf0780e3da
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
