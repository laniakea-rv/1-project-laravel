<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Les;

class LesSeeder extends Seeder
{
    public function run(): void
    {
        Les::create([
            'naam' => 'les 1',
            'beschrijving' => 'Hier leer je gitaar speelt',
            'onderwerp' => 'Gitaar',
            'abonnement_type_id' => 1,
        ]);

        Les::create([
            'naam' => 'Les 1',
            'beschrijving' => 'Hier leer je sams buik als percussie',
            'onderwerp' => 'percussie',
            'abonnement_type_id' => 2,
        ]);

        Les::create([
            'naam' => 'Les 1',
            'beschrijving' => 'Sophies rijles want auto crashen maakt ook geluid',
            'onderwerp' => 'autos',
            'abonnement_type_id' => 3,
        ]); 
        
        Les::create([
            'naam' => 'Les 2',
            'beschrijving' => 'Hier leer je de bongos als percussie',
            'onderwerp' => 'percussie',
            'abonnement_type_id' => 2,
        ]);
    }
}
