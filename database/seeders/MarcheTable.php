<?php

namespace Database\Seeders;

use App\Models\Marche;
use Database\Seeders\MarcheTable as SeedersMarchesTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class MarcheTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD:database/seeders/MarcheTable.php
        $marches = new Marche();
        $marches->title = Str::random(10);
        $marches->id_categorie = random_int(1, 20);
        $marches->description = Str::random(100);
        $marches->limit_date = '2022-01-01';
        $marches->affichage_date = '2021-01-01';
        $marches->c_charge = Str::random(10);
        $marches->save();
=======
        // $marches = new Marches();
        // $marches->title = Str::random(10);
        // $marches->id_categorie = random_int(1, 20);
        // $marches->description = Str::random(100);
        // $marches->limit_date = '2022-01-01';
        // $marches->affichage_date = '2021-01-01';
        // $marches->c_charge = Str::random(10);
        // $marches->save();
>>>>>>> bdf2befa7da04d68063a7c439b32b8a5c29e3613:database/seeders/MarchesTable.php
    }
}
