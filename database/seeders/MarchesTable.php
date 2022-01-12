<?php

namespace Database\Seeders;

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
        $marches = new Marches();
        $marches->title = Str::random(10);
        $marches->id_categorie = random_int(1, 20);
        $marches->description = Str::random(100);
        $marches->limit_date = '2022-01-01';
        $marches->affichage_date = '2021-01-01';
        $marches->c_charge = Str::random(10);
        $marches->save();
    }
}
