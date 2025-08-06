<?php

namespace App\Filament\Demo\Resources\ProfileResource\Pages;

use App\Filament\Demo\Resources\ProfileResource;
use Filament\Resources\Pages\ListRecords;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;
}