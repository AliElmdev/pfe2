<?php

namespace Database\Seeders;

use App\Models\TitreService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(catogorieTable::class);
        $this->call(DomaineTable::class);
        $this->call(MarchesTable::class);
        $this->call(B_sectionsSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(Etat_MarcheSeeder::class);
        $this->call(Etat_PostulationSeeder::class);
        $this->call(Titre_ServiceSeeder::class);
        Model::reguard();
        // \App\Models\User::factory(10)->create();
    }
}
