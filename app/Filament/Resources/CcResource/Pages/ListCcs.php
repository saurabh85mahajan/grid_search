<?php

namespace App\Filament\Resources\CcResource\Pages;

use App\Filament\Resources\CcResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCcs extends ListRecords
{
    protected static string $resource = CcResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
