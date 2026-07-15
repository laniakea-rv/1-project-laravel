<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([AbonnementTypeSeeder::class]);
        $this->call([LesSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([VideoSeeder::class]);
        $this->call([Muziekseeder::class]);
    }
}
