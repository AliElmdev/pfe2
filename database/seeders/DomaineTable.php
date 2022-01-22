<?php

namespace Database\Seeders;

use App\Models\Domaine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DomaineTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dom = new Domaine();
        $dom->name = Str::random(10);
        $dom->save();
    }
}
