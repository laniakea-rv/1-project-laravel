<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Muziek;

class Muziekseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Muziek::create([
            'naam'=>'samballen',
            'beschrijving'=>'de beste slechtste en enigste augurkpunkband',
            'bestand'=>'barkfart.mp3',
            'prijs'=>30.00,
            'afbeelding'=>'foto/foto/loctie',
        ]);

        Muziek::create([
            'naam'=>'samballen',
            'beschrijving'=>'de beste slechtste en enigste augurkpunkband',
            'bestand'=>'barkfart.mp3',
            'prijs'=>30.00,
            'afbeelding'=>'foto/foto/loctie',
        ]);

        Muziek::create([
            'naam'=>'samballen',
            'beschrijving'=>'de beste slechtste en enigste augurkpunkband',
            'bestand'=>'barkfart.mp3',
            'prijs'=>30.00,
            'afbeelding'=>'foto/foto/loctie',
        ]);
    }
}
