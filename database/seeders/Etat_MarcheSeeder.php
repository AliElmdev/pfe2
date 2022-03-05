<?php

namespace Database\Seeders;

use App\Models\EtatMarche;
use Illuminate\Database\Seeder;

class Etat_MarcheSeeder extends Seeder
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
                'id'        => 1,
                'description' => 'Marché créer par le chef',
            ],
            [
                'id'        => 2,
                'description' => 'Marché valider par le responsable d\'achat et lancer',
            ],
            [
                'id'        => 3,
                'description' => 'Marché dans la phase de selection base RFI',
            ],
            [
                'id'        => 4,
                'description' => 'Marché dans la phase de selection base technique',
            ],
            [
                'id'        => 5,
                'description' => 'Marché dans la phase de selection base commercial',
            ],
            [
                'id'        => 6,
                'description' => 'Le marché est gagné par une entreprise',
            ],
        ];

        foreach ($etats as $etat) {
            $item = new EtatMarche();
            $item->id = $etat['id'];
            $item->description = $etat['description'];
            $item->save();
        }
    }
}
