<?php

namespace Database\Seeders;

use App\Models\Marche;
use App\Models\Marches;
use Database\Seeders\MarchesTable as SeedersMarchesTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class MarchesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marches = new Marche();
        $marches->title = 'creation d une application mobile';
        $marches->id_categorie = 2;
        $marches->description = 'description 1';
        $marches->limit_date = '2022-01-01';
        $marches->affichage_date = '2021-01-01';
        $marches->etat = '1';
        $marches->c_charge = '#123';
        $marches->save();
    }
}
