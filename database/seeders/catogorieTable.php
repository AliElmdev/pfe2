<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class catogorieTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new Categorie();
        $cate->name = 'dev';
        $cate->id_domaine = 1;
        $cate->save();

        $cate = new Categorie();
        $cate->name = 'logiciel';
        $cate->id_domaine = 1;
        $cate->save();
    }
}
