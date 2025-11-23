<?php

namespace Database\Seeders;

use App\Models\DigitGridCar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class NovDigitCarSeeder extends Seeder
{
    public function run(): void
    {
        // Keep headings exactly as in Excel (no slugifying)
        HeadingRowFormatter::default('none');

        $path = database_path('seeders/data/digit_nov.xlsx');

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

        // Helper to extract numeric part from things like "25.0%", "25% Maruti..."
        $parsePercent = function ($value) {
            if ($value === null || $value === '') {
                return null;
            }

            // if cell is already numeric in Excel:
            if (is_numeric($value)) {
                if ($value > 1) {
                    return $value;
                }
                return (float) $value * 100;
            }

            return $value;
        };

        foreach ($rows as $row) {
            // skip completely empty lines
            if (empty(trim($row['1'] ?? ''))) {
                continue;
            }

            if ($row[0] == 'State') {
                continue;
            }

            DigitGridCar::create([
                'rto_state'     => $row['0'] ?? null,
                'rto_zone'      => $row['1'] ?? null,

                'saod_petrol_non_hev'            => $parsePercent($row['2'] ?? null),
                'saod_petrol_hev' => $parsePercent($row['3'] ?? null),
                'saod_non_petrol_non_hev'  => $parsePercent($row['4'] ?? null),
                'saod_non_petrol_hev'                   => $parsePercent($row['5'] ?? null),
                'comp_petrol_non_hev'      => $parsePercent($row['6'] ?? null),
                'comp_petrol_hev'           => $parsePercent($row['7'] ?? null),
                'comp_non_petrol_non_hev'           => $parsePercent($row['8'] ?? null),
                'comp_non_petrol_hev'           => $parsePercent($row['9'] ?? null),
                'period' => 1,
                'is_highlight' =>  false,
            ]);
        }
    }
}
