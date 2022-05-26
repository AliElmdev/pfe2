<?php

namespace Database\Seeders;

use App\Models\B_section;
use Illuminate\Database\Seeder;

class B_sectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $B_sections = [
            [
                'nom'        => '1. Réponse de qualification (nombre de questions : 0 )',
                'type_section' => 'RFI',
            ],
            [
                'nom'        => '2. Réponse technique (nombre de questions : 0 )',
                'type_section' => 'RFI',
            ],
        ];

        foreach ($B_sections as $b_section) {
            $b_sectio = new B_section();
            $b_sectio->nom = $b_section['nom'];
            $b_sectio->type_section = $b_section['type_section'];
            $b_sectio->save();
        }
    }
}
