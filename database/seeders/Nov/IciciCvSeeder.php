<?php

namespace Database\Seeders\Nov;

use App\Models\IciciGridCv;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class IciciCvSeeder extends Seeder
{
    public function run(): void
    {
        // Keep headings exactly as in Excel (no slugifying)
        HeadingRowFormatter::default('none');

        $path = database_path('seeders/data/nov/icici_cv.xlsx');

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

        // First row contains the categories (headers)
        $headerRow = $rows->first();
        
        // Extract categories (skip first item which is "RTO Cluster")
        $categories = $headerRow->slice(1)->values();

        // Process each data row (skip the header row)
        foreach ($rows->skip(1) as $row) {
            // Skip completely empty rows
            if ($row->filter()->isEmpty()) {
                continue;
            }

            // Get the RTO Cluster (state name)
            $rtoCluster = $row[0];

            // Skip if no RTO Cluster value
            if (empty($rtoCluster)) {
                continue;
            }

            // Loop through each category and create a record
            foreach ($categories as $index => $category) {
                // The value index is offset by 1 because first column is RTO Cluster
                $value = $row[$index + 1] ?? null;

                IciciGridCv::create([
                    'rto_cluster' => $rtoCluster,
                    'category' => $category,
                    'value' => $value,
                    'period' => 1,
                    'is_highlight' => false,
                ]);
            }
        }
    }
}