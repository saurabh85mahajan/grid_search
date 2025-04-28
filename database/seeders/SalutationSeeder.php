<?php

namespace Database\Seeders;

use App\Models\Salutation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalutationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salutations = [
            ['name' => 'Mr.'],
            ['name' => 'Mrs.'],
            ['name' => 'Miss.'],
            ['name' => 'Dr.'],
            ['name' => 'Esq.'],
            ['name' => 'Hon.'],
            ['name' => 'Jr'],
            ['name' => 'Messrs'],
            ['name' => 'Mmes.'],
            ['name' => 'Msgr.'],
            ['name' => 'Prof.'],
            ['name' => 'Rev.'],
            ['name' => 'Sr.'],
            ['name' => 'St.'],
            ['name' => 'Capt.'],
            ['name' => 'Lt.Col.'],
            ['name' => 'Cdr.'],
            ['name' => 'Brig.'],
            ['name' => 'Col.'],
            ['name' => 'Maj.'],
            ['name' => 'Sqn Ldr'],
            ['name' => 'Adv.'],
            ['name' => 'Lt.Gen..'],
        ];

        foreach ($salutations as $salutation) {
            Salutation::firstOrCreate(
                ['name' => $salutation['name']],
                ['is_active' => true],
            );
        }
    }
}
