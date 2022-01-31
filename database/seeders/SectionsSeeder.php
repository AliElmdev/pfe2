<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'nom_section'        => ' 1.1 Dossier Fournisseur - Données Saisies - Section avec questions VM',
                'b_section_id'       => '1'
            ],
            [
                'nom_section'        => ' 1.2 Dossier Fournisseur - Pièces jointes - Section avec questions VM',
                'b_section_id'       => '1'
            ],
            [
                'nom_section'        => ' 1.3 Management HSE- section avec VM',
                'b_section_id'       => '1'
            ],
            [
                'nom_section'        => ' 2.1  SITUATION FINANCIAIRE ',
                'b_section_id'       => '2'
            ],
            [
                'nom_section'        => ' 2.2 EXPERIENCE ET REFERENCES  ',
                'b_section_id'       => '2'
            ],
            [
                'nom_section'        => ' 2.3 CERTIFICATION ',
                'b_section_id'       => '2'
            ],
        ];

        foreach ($sections as $section) {
            $sectio = new Section();
            $sectio->nom_section = $section['nom_section'];
            $sectio->b_section_id = $section['b_section_id'];
            $sectio->save();
        }

    }
}
