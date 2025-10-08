<?php

namespace App\Filament\Resources\InsuranceGridRawResource\Pages;

use App\Filament\Resources\InsuranceGridRawResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsuranceGridRaws extends ListRecords
{
    protected static string $resource = InsuranceGridRawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
