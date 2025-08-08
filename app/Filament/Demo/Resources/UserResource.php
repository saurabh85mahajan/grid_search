<?php

namespace App\Filament\Demo\Resources;

use App\Filament\Demo\Resources\UserResource\Pages;
use App\Filament\Resources\Base\BaseUserResource;

class UserResource extends BaseUserResource
{
    public const ORGANISATION_ID = 3;
	
	protected static function getListPageClass(): string
    {
        return Pages\ListUsers::class;
    }

    protected static function getCreatePageClass(): string
    {
        return Pages\CreateUser::class;
    }

    protected static function getEditPageClass(): string
    {
        return Pages\EditUser::class;
    }
}
