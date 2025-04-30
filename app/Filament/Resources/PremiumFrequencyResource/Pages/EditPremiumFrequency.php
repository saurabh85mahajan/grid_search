<?php

namespace App\Filament\Resources\PremiumFrequencyResource\Pages;

use App\Filament\Resources\PremiumFrequencyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPremiumFrequency extends EditRecord
{
    protected static string $resource = PremiumFrequencyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
