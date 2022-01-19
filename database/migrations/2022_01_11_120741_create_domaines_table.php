<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaines', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2022_01_10_1171237_create_domaines_table.php
<<<<<<< HEAD:database/migrations/2022_01_10_1171237_create_domaines_table.php
            $table->id('id_domaine');
=======
            $table->increments('id_domaine');
>>>>>>> bdf2befa7da04d68063a7c439b32b8a5c29e3613:database/migrations/2022_01_11_120741_create_domaine_table.php
=======
            $table->id();
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b:database/migrations/2022_01_11_120741_create_domaines_table.php
            $table->string('name');
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
        Schema::dropIfExists('domaine');
    }
}
