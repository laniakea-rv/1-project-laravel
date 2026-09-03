<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use App\Models\Workshop;

class WorkshopSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Workshop::create([
                'naam' => 'Workshop ' . $i,
                'beschrijving' => 'Beschrijving van workshop ' . $i,
                'locatie' => 'Locatie ' . $i,
                'tijd' => DateTime::createFromFormat('Y-m-d H:i:s', '2024-07-0' . $i . ' 10:00:00'),
                'afbeelding' => 'bal.jpg',
            ]);
        }
    }
}
