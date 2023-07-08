<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Materiel;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Projet::factory(8)->has(Tache::factory(5)->has(User::factory(3))->has(Materiel::factory(8)))->create();
        // Materiel::factory(6)->for(Tache::factory(4))->create();

        $this->call(LaratrustSeeder::class);

        // User::factory(10)->has(Tache::factory(4))->create();
    }
}
