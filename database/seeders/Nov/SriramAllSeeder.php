<?php

namespace Database\Seeders\Nov;

use App\Models\SriramGridAll;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class SriramAllSeeder extends Seeder
{
    public function run(): void
    {
        // Keep headings exactly as in Excel (no slugifying)
        HeadingRowFormatter::default('none');

        $path = database_path('seeders/data/nov/sriram_all.xlsx');

        // Read all sheets as collections (heading row used as keys)
        $sheets = Excel::toCollection(
            new class implements ToCollection {
                public function collection(Collection $rows)
                {
                    // not used, Excel::toCollection returns the rows to $sheets
                }
            },
            $path
        );

        // Sheet index 1 = second sheet (0-based)
        $rows = $sheets[0];

        foreach ($rows as $row) {
            if ($row[0] == 'State') {
                continue;
            }

            SriramGridAll::create([
                'state'     => $row['0'] ?? null,
                'category'      => $row['1'] ?? null,
                'dis'      => $row['2'] ?? null,
                'value'      => $row['3'] ?? null,
                'policy_type'      => $row['4'] ?? null,
                'age'      => $row['5'] ?? null,
                'remarks'      => $row['6'] ?? null,
                'remarks'      => $row['7'] ?? null,

                'period' => 1,
                'is_highlight' =>  false,
            ]);
        }
    }
}
