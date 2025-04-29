<?php

namespace App\Filament\Resources\SalutationResource\Pages;

use App\Filament\Resources\SalutationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalutation extends EditRecord
{
    protected static string $resource = SalutationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
