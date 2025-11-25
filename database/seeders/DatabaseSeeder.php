<?php

namespace Database\Seeders;

use Database\Seeders\Nov\DigitCarSeeder;
use Database\Seeders\Nov\IciciCarSeeder;
use Database\Seeders\Nov\IciciCvSeeder;
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
           OctBajajHealthSeeder::class,

           NovDlSeeder::class,
           NovGujaratSeeder::class,
           NovMhSeeder::class,
        //    NovBrSeeder::class,
           NovOrientSeeder::class,
           NovUnitedSeeder::class,
           NovBajajHealthSeeder::class,
           NovNeSeeder::class,
           NovPbSeeder::class,
           NovApSeeder::class,

           //New Files.
           IciciCarSeeder::class,
           DigitCarSeeder::class,
           IciciCvSeeder::class,
        ]);
    }
}
