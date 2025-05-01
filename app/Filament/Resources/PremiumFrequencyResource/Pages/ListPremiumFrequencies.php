<?php

namespace App\Filament\Resources\PremiumFrequencyResource\Pages;

use App\Filament\Resources\PremiumFrequencyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPremiumFrequencies extends ListRecords
{
    protected static string $resource = PremiumFrequencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
