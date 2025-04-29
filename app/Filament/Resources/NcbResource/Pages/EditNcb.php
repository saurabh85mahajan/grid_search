<?php

namespace App\Filament\Resources\NcbResource\Pages;

use App\Filament\Resources\NcbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNcb extends EditRecord
{
    protected static string $resource = NcbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\DeleteAction::make(),
        ];
    }
}
