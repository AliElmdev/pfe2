<?php

namespace Database\Seeders;

use App\Models\TitreService;
use Illuminate\Database\Seeder;

class Titre_ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titres = [
            [
                'id'        => 1,
                'description' => 'Propriétaire',
            ],
            [
                'id'        => 2,
                'description' => 'Chef de projet',
            ],
            [
                'id'        => 3,
                'description' => 'Service Commercial/Marketing',
            ],
            [
                'id'        => 4,
                'description' => 'Département production',
            ],
            [
                'id'        => 5,
                'description' => 'Département projet',
            ],
            [
                'id'        => 6,
                'description' => 'Département Achat',
            ],
            [
                'id'        => 7,
                'description' => 'Professionnel/Consultant',
            ],
            [
                'id'        => 8,
                'description' => 'Représentant légal',
            ],
            [
                'id'        => 9,
                'description' => 'Président',
            ],
            [
                'id'        => 10,
                'description' => 'Vice-président',
            ],
            [
                'id'        => 11,
                'description' => 'Dirigeant unique',
            ],
            [
                'id'        => 12,
                'description' => 'Directeur général',
            ],
        ];

        foreach ($titres as $titre) {
            $item = new TitreService();
            $item->id = $titre['id'];
            $item->description = $titre['description'];
            $item->save();
        }
    }
}
