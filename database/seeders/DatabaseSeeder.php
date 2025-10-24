<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
           OctDlSeeder::class,
           OctGujaratSeeder::class,
           OctMhSeeder::class,
           OctBrSeeder::class,
           OctOrientSeeder::class,
           OctUnitedSeeder::class,
        ]);
    }
}
