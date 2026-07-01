<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Abonnementtype;

class AbonnementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Abonnementtype::create([
            'naam' => 'abonnement 1',
            'beschrijving' => 'wow een cool abonnement',
            'prijs' => 30.00,

        ]);
        Abonnementtype::create([
            'naam' => 'abonnement 1',
            'beschrijving' => 'wow een cool abonnement',
            'prijs' => 30.00,

        ]);
        Abonnementtype::create([
            'naam' => 'abonnement 1',
            'beschrijving' => 'wow een cool abonnement',
            'prijs' => 30.00,

        ]);
    }
}
