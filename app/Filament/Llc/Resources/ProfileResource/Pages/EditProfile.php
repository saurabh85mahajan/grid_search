<?php

namespace App\Filament\Llc\Resources\ProfileResource\Pages;

use App\Filament\Llc\Resources\ProfileResource;
use Filament\Resources\Pages\EditRecord;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return '/llc'; // This will redirect to the dashboard
    }
}