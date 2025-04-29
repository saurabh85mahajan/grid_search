<?php

namespace App\Filament\Resources\CcResource\Pages;

use App\Filament\Resources\CcResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCc extends EditRecord
{
    protected static string $resource = CcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
