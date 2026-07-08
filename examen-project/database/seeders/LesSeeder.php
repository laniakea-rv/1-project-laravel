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
        ]);

        Les::create([
            'naam' => 'Les 2',
            'beschrijving' => 'Hier leer je sams buik als percussie',
            'onderwerp' => 'percussie',
        ]);

        Les::create([
            'naam' => 'Les 3',
            'beschrijving' => 'Sophies rijles want auto crashen maakt ook geluid',
            'onderwerp' => 'autos',
        ]);
    }
}
