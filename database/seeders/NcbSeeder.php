<?php

namespace Database\Seeders;

use App\Models\Ncb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NcbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ncbs = [
            ['name' => '0'],
            ['name' => '20'],
            ['name' => '25'],
            ['name' => '35'],
            ['name' => '45'],
            ['name' => '50'],
            ['name' => '65'],
        ];

        foreach ($ncbs as $ncb) {
            Ncb::firstOrCreate(
                ['name' => $ncb['name']],
                ['is_active' => true],
            );
        }
    }
}
