<?php

namespace App\Filament\Llc\Resources\CcResource\Pages;

use App\Filament\Llc\Resources\CcResource;
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
