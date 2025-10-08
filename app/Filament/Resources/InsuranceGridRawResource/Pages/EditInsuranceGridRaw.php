<?php

namespace App\Filament\Resources\InsuranceGridRawResource\Pages;

use App\Filament\Resources\InsuranceGridRawResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceGridRaw extends EditRecord
{
    protected static string $resource = InsuranceGridRawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
