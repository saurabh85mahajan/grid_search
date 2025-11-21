<?php

namespace App\Console\Commands;

use App\Models\InsuranceGridRaw;
use Illuminate\Console\Command;

class PopulateDiffColumn extends Command
{
    protected $signature = 'app:populate-diff';

    protected $description = 'Populate the diff column by comparing each record with its previous period record';

    public function handle(): int
    {
        $this->info('Starting diff population...');

        $query = InsuranceGridRaw::query()
            ->where('period', '>', 1);

        // Process in chunks to avoid memory issues
        $query
            ->orderBy('region')
            ->orderBy('insurer')
            ->orderBy('segment')
            ->orderBy('location')
            ->orderBy('policy_type')
            ->orderBy('period')
            ->chunkById(500, function ($rates) {
                foreach ($rates as $rate) {

                    $previous = InsuranceGridRaw::query()
                        ->where('region', $rate->region)
                        ->where('insurer', $rate->insurer)
                        ->where('segment', $rate->segment)
                        ->where('location', $rate->location)
                        ->where('policy_type', $rate->policy_type)
                        ->where('remarks_additional', $rate->remarks_additional)
                        ->where('period', $rate->period - 1)
                        ->first();

                    if (! $previous) {
                        // no matching previous record, leave diff as null
                        continue;
                    }

                    // Ensure we treat these as numbers
                    $currentPoints = (float) $rate->points;
                    $previousPoints = (float) $previous->points;

                    if ($previousPoints != $currentPoints) {
                        $this->info('Updating ' . $rate->id . ' Compared with ' . $previous->id);
                        $rate->diff = $currentPoints - $previousPoints;
                        $rate->save();
                    }
                }
            });

        $this->info('Diff population finished.');

        return self::SUCCESS;
    }
}
