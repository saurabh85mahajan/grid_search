<?php

namespace Database\Seeders;

use App\Models\IciciGridCar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class NovIciciCarSeeder extends Seeder
{
    public function run(): void
    {
        // Keep headings exactly as in Excel (no slugifying)
        HeadingRowFormatter::default('none');

        $path = database_path('seeders/data/icici_nov.xlsx');

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
        $rows = $sheets[1];

        // Helper to extract numeric part from things like "25.0%", "25% Maruti..."
        $parsePercent = function ($value) {
            if ($value === null || $value === '') {
                return null;
            }

            // if cell is already numeric in Excel:
            if (is_numeric($value)) {
                return (float) $value * 100;
            }

            return $value;
        };

        foreach ($rows as $row) {
            // skip completely empty lines
            if (empty(trim($row['3'] ?? ''))) {
                continue;
            }

            if ($row[3] == 'RTO Location') {
                continue;
            }

            IciciGridCar::create([
                'rto_category'  => $row['0'] ?? null,
                'rto_zone'      => $row['1'] ?? null,
                'rto_state'     => $row['2'] ?? null,
                'rto_location'  => $row['3'] ?? null,

                'pvt_car_new_1_3'            => $parsePercent($row['4'] ?? null),
                'pvt_car_petrol_cng_1_1_ncb' => $parsePercent($row['5'] ?? null),
                'pvt_car_diesel_ev_1_1_ncb'  => $parsePercent($row['6'] ?? null),
                'saod_ncb'                   => $parsePercent($row['7'] ?? null),
                'pvt_car_0_ncb_non_ncb'      => $parsePercent($row['8'] ?? null),
                'pvt_car_used_car'           => $parsePercent($row['9'] ?? null),
                'period' => 1,
                'is_highlight' =>  ($row['3'] == 'Assam') ? true : false,
            ]);
        }
    }
}
