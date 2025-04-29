<?php

namespace App\Filament\Resources\RtoResource\Pages;

use App\Filament\Resources\RtoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRto extends EditRecord
{
    protected static string $resource = RtoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
