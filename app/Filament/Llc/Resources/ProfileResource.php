<?php

namespace App\Filament\Llc\Resources;

use App\Filament\Llc\Resources\ProfileResource\Pages;
use App\Filament\Resources\BaseProfileResource;

class ProfileResource extends BaseProfileResource
{
    protected static function getListPageClass(): string
    {
        return Pages\ListProfiles::class;
    }

    protected static function getCreatePageClass(): string
    {
        return Pages\CreateProfile::class;
    }

    protected static function getEditPageClass(): string
    {
        return Pages\EditProfile::class;
    }
}