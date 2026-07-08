<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        Video::create([
            'les_id' => 1,
            'naam' => 'sams youtube',
            'bestand' => "https://www.youtube.com/embed/Zqm_NmXQpW4",
        ]);
        Video::create([
            'les_id' => 1,
            'naam' => 'opera',
            'bestand' => "https://www.youtube.com/embed/4hhaw-S7ZTo",
        ]);
        Video::create([
            'les_id' => 1,
            'naam' => 'funk',
            'bestand' => "https://www.youtube.com/embed/hi_1COJ1SXU",
        ]);
        Video::create([
            'les_id' => 2,
            'naam' => 'percussie',
            'bestand' =>"https://www.youtube.com/embed/XUERPM7NGN0",
        ]);
        Video::create([
            'les_id' => 3,
            'naam' => 'sams youtube',
            'bestand' =>"https://www.youtube.com/embed/BXSREHYstkQ",
        ]);
    }
}