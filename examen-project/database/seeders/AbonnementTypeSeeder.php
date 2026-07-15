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
            'beschrijving' => 'wow een cool abonnement voor arme mensen',
            'prijs' => 1.00,

        ]);
        Abonnementtype::create([
            'naam' => 'abonnement 2',
            'beschrijving' => 'wow een cool abonnement',
            'prijs' => 2.00,

        ]);
        Abonnementtype::create([
            'naam' => 'abonnement 3',
            'beschrijving' => 'wow een cool en luxe abonnement',
            'prijs' => 30000.00,

        ]);
    }
}
