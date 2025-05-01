<?php

namespace App\Filament\Ppc\Resources\EntryResource\Pages;

use App\Filament\Ppc\Resources\EntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEntries extends ListRecords
{
    protected static string $resource = EntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
