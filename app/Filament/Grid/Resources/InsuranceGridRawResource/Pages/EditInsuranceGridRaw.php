<?php

namespace App\Filament\Grid\Resources\InsuranceGridRawResource\Pages;

use App\Filament\Grid\Resources\InsuranceGridRawResource;
use Filament\Resources\Pages\EditRecord;

class EditInsuranceGridRaw extends EditRecord
{
    protected static string $resource = InsuranceGridRawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
