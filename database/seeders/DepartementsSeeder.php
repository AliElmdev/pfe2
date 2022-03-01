<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = new Departement();
        $dept->nom = 'Informatique';
        $dept->save();

        $dept = new Departement();
        $dept->nom = 'Marketing';
        $dept->save();

        $dept = new Departement();
        $dept->nom = 'Design';
        $dept->save();

        $dept = new Departement();
        $dept->nom = 'RH';
        $dept->save();
    }
}
