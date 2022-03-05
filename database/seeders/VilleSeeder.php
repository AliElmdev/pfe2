<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villes = [
            [
                'ville'        => 'Meknès',
                'region' => 'Fès Meknès',
            ],
            [
                'ville'         => 'Fès',
                'region' => 'Fès Meknès',
            ],
            [
                'ville'        => 'Marrakech',
                'region' => 'Marrakech-Safi',
            ],
            [
                'ville'        => 'Casablanca',
                'region' => 'Casablanca-Settat',
            ],
            [
                'ville'         => 'Tanger',
                'region' => 'Tanger-Tétouan-Al Hoceïma',
            ],
            [
                'ville'         => 'Agadir',
                'region' => 'Souss-Massa',
            ],
        ];

        foreach ($villes as $ville) {
            $item = new Ville();
            $item->ville = $ville['ville'];
            $item->region = $ville['region'];
            $item->save();
        }
    }
}
