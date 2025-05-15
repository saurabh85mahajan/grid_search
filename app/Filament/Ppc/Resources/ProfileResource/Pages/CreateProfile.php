<?php

namespace App\Filament\Ppc\Resources\ProfileResource\Pages;

use App\Filament\Ppc\Resources\ProfileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile extends CreateRecord
{
    protected static string $resource = ProfileResource::class;
    public static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return '/ppc'; // This will redirect to the dashboard
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        
        return $data;
    }
}