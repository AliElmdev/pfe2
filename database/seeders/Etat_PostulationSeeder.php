<?php

namespace Database\Seeders;

use App\Models\EtatPostulaion;
use Illuminate\Database\Seeder;

class Etat_PostulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etats = [
            [
                'id'        => 0,
                'description' => 'L\'entreprise éliminer',
            ],
            [
                'id'        => 1,
                'description' => 'L\' entreprise a accéder au marché',
            ],
            [
                'id'        => 2,
                'description' => 'L\' entreprise a postuler au marché',
            ],
            [
                'id'        => 3,
                'description' => 'L\' entreprise a passer de l\'étape RFI',
            ],
            [
                'id'        => 4,
                'description' => 'L\' entreprise a passer de l\'étape selection technique',
            ],
            [
                'id'        => 5,
                'description' => 'L\' entreprise a gagner le marché',
            ],
        ];

        foreach ($etats as $etat) {
            $item = new EtatPostulaion();
            $item->id = $etat['id'];
            $item->description = $etat['description'];
            $item->save();
        }
    }
}
