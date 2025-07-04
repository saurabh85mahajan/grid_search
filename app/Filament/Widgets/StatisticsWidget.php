<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
use App\Models\User; // Adjust based on your User model
use App\Models\Cc;   // Adjust based on your Cc model

class StatisticsWidget extends Widget
{
    protected static string $view = 'filament.widgets.statistics-widget';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'organizationStats' => $this->getOrganizationStats(),
            'ccTableCount' => $this->getCcTableCount(),
        ];
    }

    private function getOrganizationStats(): array
    {
        return User::select('organisation_id', DB::raw('count(*) as user_count'))
            ->whereNotNull('organisation_id')
            ->groupBy('organisation_id')
            ->orderBy('user_count', 'desc')
            ->get()
            ->toArray();
    }

    private function getCcTableCount(): int
    {
        return Cc::count();
    }
}