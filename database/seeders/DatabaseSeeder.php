<?php

namespace Database\Seeders;

use App\Models\TypeAnnonce;
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
        // \App\Models\User::factory(10)->create();
         $this->call(
             [
                CategorieSeeder::class,
                PaysSeeder::class,
                RoleSeeder::class,
                TypeSeeder::class,
                UserSeeder::class,
                AnnonceSeeder::class,
             ]
        );

    }
}
