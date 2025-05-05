<?php

namespace App\Filament\Llc\Resources\CcResource\Pages;

use App\Filament\Llc\Resources\CcResource;
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

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
